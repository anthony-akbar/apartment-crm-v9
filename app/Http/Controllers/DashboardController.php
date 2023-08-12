<?php

namespace App\Http\Controllers;

use App\Models\AptContract;
use App\Models\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index');
    }

    public function search(Request $request) {

        $data = $request->all()['data'];
        $contracts =  [];
        $payments = [];
        $clients =Client::where('name', 'Like', '%' . $data . '%')
            ->orWhere('firstname', 'Like', '%' . $data . '%')
            ->orWhere('fathersname', 'Like', '%' . $data . '%')
            ->orWhere('passportId', 'Like', '%' . $data . '%')
            ->get();
        foreach ($clients as $client) {

            foreach ($client->contracts()->get() as $contract) {
                $contracts[] = $contract->toArray();
            }
            foreach ($client->payments()->get() as $payment) {
                $payments[] = $payment->toArray();
            }

        }
        return view('sections.search-results', compact('clients', 'contracts', 'payments'));
    }
}
