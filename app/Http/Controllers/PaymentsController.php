<?php

namespace App\Http\Controllers;

use App\Models\AptContract;
use App\Models\Client;
use App\Models\Payment;
use App\Models\PaymentArticle;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

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




        /*foreach ($contracts as $contract) {
            dump($contract);
        }
        dd($contracts);*/
        return view('payments.contract-selector', compact('contracts'));
    }

    public function store(Request $request) {
        $data = $request->all();
        dump($data);
        $total = (int)$data['total'];
        $article = PaymentArticle::find((int)$data['article_id']);

        $schedule = Schedule::where('contract_id', $data['contract_id'])->get(); // №1 => $data['contract_id']

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
            if($total > $item->amount){
                $item->update([
                    'status'=>'Оплачено',
                    'paid'=> $item->amount,
                    'date_to_pay'=> Carbon::now()->format('d.m.Y'),
                ]);
                $total = $total - $item->amount;
                dump($total);
            }else if($total < $item->amount){
                $item->update([
                    'status'=>'Частичная оплата',
                    'paid'=> $total,
                    'date_to_pay'=> Carbon::now()->format('d.m.Y'),
                ]);
                $total = 0;
                dump($total);
                break;
            }
        }

        if($article->table === 'apt_contracts'){
            $contract = AptContract::find($data['contract_id']);
            $contract->update([
                'paid'=> $contract->paid + $total,
                'debt' => $contract->debt - $total
            ]);
        }
    }

}
