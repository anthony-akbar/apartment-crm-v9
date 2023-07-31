<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use App\Models\AptContract;
use App\Models\Client;
use Illuminate\Http\Request;

class AptContractController extends Controller
{
    public function index()
    {
        $aptContracts = AptContract::all();
        return view('contracts.apartments.index', compact('aptContracts'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('contracts.apartments.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        AptContract::create([
            'apt_id' => $data['apt_id'],
            'client_id' => $data['client_id'],
            'price' => $data['price'],
            'amount' => $data['amount'],
            'paid' => 0,
            'debt' => 0,
            'days_missed' => 0
        ]);
        return redirect()->route('contracts.apartments');
    }

    public function search(Request $request)
    {
        $data = $request->all()['data'];
        $apt = Appartment::find($data[0]);
        return view('apartments.apt-details', compact('apt'));
    }
}
