<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::paginate(10);
        return view('clients.index', compact('clients'));
    }

    public function create() {
        return view('clients.create');
    }

    public function store(Request $request) {
        dd($request->all());
        return redirect()->route('clients.index');
    }

    public function search(Request $request) {
        $data = $request->all()['data'];
        $clients = Client::where($data)->get();
        return view('contracts.apartments.client-tooltip', compact('clients'));
    }
}
