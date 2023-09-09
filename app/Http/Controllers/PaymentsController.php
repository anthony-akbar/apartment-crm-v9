<?php

namespace App\Http\Controllers;

use App\Models\AptContract;
use App\Models\Client;
use App\Models\Payment;
use App\Models\PaymentArticle;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use nikserg\Num2Str\Num2Str;
use PhpOffice\PhpWord\TemplateProcessor;

class PaymentsController extends Controller
{
    public function index() {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    public function create() {
        $clients = Client::all();
        $contracts = AptContract::all();
        $articles = PaymentArticle::all();
        return view('payments.create', compact('clients', 'contracts', 'articles'));
    }

    public function searchContracts(Request $request) {
        $data = $request->all()['data'];
        $client = Client::find($data);
        $contracts = $client->contracts;

        return view('payments.contract-selector', compact('contracts'));
    }

    public function store(Request $request) {
        $data = $request->all();

        Payment::create([
           'client_id' => $data['client_id'],
            'contract_id' => $data['contract_id'],
            'article_id' => $data['article_id'],
            'amount_kgs' => $data['amount_kgs'],
            'amount_usd' => $data['amount_usd'],
            'amount' => (int)$data['total']
        ]);

        $total = (int)$data['total'];
        $article = PaymentArticle::find((int)$data['article_id']);

        $schedule = Schedule::where('contract_id', $data['contract_id'])->get();

        $partial = $schedule->where('status', 'Частичная оплата');

        foreach ($partial as $item) {
            if($total > ($item->amount - $item->paid)){
                $item->update([
                   'status'=> 'Оплачено',
                    'paid'=> $item->paid + ($item->amount - $item->paid),
                    'date_to_pay'=> Carbon::now()->format('d.m.Y'),
                ]);
                $total = $total - ($item->amount - $item->paid);
                dump($total);
            }
        }
        $unpaid = $schedule->where('status', 'Не оплачено');
        foreach ($unpaid as $item) {
            if($total >= $item->amount){
                $item->update([
                    'status'=>'Оплачено',
                    'paid'=> $item->amount,
                    'date_to_pay'=> Carbon::now()->format('d.m.Y'),
                ]);
                $total = $total - $item->amount;
            }else if($total < $item->amount){
                $item->update([
                    'status'=>'Частичная оплата',
                    'paid'=> $total,
                    'date_to_pay'=> Carbon::now()->format('d.m.Y'),
                ]);
                $total = 0;
                break;
            }
        }
        if($article->table === 'apt_contracts'){
            $contract = AptContract::find($data['contract_id']);
            $contract->update([
                'paid'=> $contract->paid + (int)$data['total'],
                'debt' => $contract->debt - (int)$data['total']
            ]);
        }

        return redirect()->route('payments');
    }

    public function download($id) {

        $payment = Payment::find($id);
        $contract = $payment->contract()->get()[0];
        $client = $payment->client()->get()[0];
        $article = $payment->article()->get()[0];

        $templateFilePath = 'PaymentSample.docx';
        $templateProcessor = new TemplateProcessor($templateFilePath);

        $templateProcessor->setValue('id', $payment->id);
        $templateProcessor->setValue('date', Carbon::parse($payment->created_at)->format('d.m.Y'));
        $templateProcessor->setValue('day', Carbon::parse($payment->created_at)->format('d'));
        $templateProcessor->setValue('monthStr', Carbon::parse($payment->created_at)->getTranslatedMonthName('Do MMMM'));
        $templateProcessor->setValue('year', Carbon::parse($payment->created_at)->format('Y'));
        $templateProcessor->setValue('client', $client->firstname . ' ' . $client->name);
        $templateProcessor->setValue('paymentArticle', $article->title . ' номер договора ' . $payment->contract_id);
        $templateProcessor->setValue('amount', number_format($payment->amount, 0, '.', ' '));

        $numstr = Num2Str::convert($payment->amount);
        $array = explode(" ", $numstr);
        $numstr = '';
        for ($i = 0; $i < count($array) - 3; $i++) {
            $numstr .= $array[$i] . ' ';
        }
        $templateProcessor->setValue('amountStr', $numstr);

        $currency = $contract->currency === "USD" ? 'долларов' : 'сомов';
        $currencyPoint = $contract->currency === "USD" ? 'центов' : 'тыйын';

        $templateProcessor->setValue('currency', $currency);
        $templateProcessor->setValue('currencyPoint', $currencyPoint);

        $newFilePath = $payment->id . '.docx';
        $templateProcessor->saveAs('storage/contracts/' . $newFilePath );
        return redirect()->away(request()->root() . '/storage/contracts/' . $newFilePath);


    }

}
