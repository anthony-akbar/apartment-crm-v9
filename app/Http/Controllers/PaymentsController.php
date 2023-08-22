<?php

namespace App\Http\Controllers;

use App\Models\AptContract;
use App\Models\Client;
use App\Models\Payment;
use App\Models\PaymentArticle;
use App\Models\Schedule;
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

        $target = DB::table($article->table)->where('id', $data['contract_id'])->get();
        $schedule = Schedule::where('contract_id', $data['contract_id'])->get();

        $partial = $schedule->where('status', 'Частичная оплата');

        foreach ($partial as $item) {
            if($total > ($item->amount - $item->paid)){
                $item->update([
                   'status'=> 'Оплачено',
                    'paid'=>$item->paid + ($item->amount - $item->paid)
                ]);
                $total = $total - ($item->amount - $item->paid);
            }
        }

        $unpaid = $schedule->where('status', 'Не оплачено');

        foreach ($unpaid as $item) {
            if($total > $item->amount){
                $item->update([
                    'status'=>'Оплачено',
                    'paid'=> $item->amount
                ]);
                $total = $total - $item->amount;
            }else if($total < $item->amount){
                $item->update([
                    'status'=>'Частичная оплата',
                    'paid'=> $total
                ]);
                $total = 0;
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
