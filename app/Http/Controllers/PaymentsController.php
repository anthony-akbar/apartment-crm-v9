<?php

namespace App\Http\Controllers;

use App\Models\AptContract;
use App\Models\Client;
use App\Models\Payment;
use App\Models\PaymentArticle;
use Illuminate\Http\Request;

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
        dd($request->all());
    }
}
