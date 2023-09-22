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
        $data = $request->all();
        $data['birth'] = date("Y-m-d", strtotime($data['birth']));
        $data['givendate'] = date("Y-m-d", strtotime($data['givendate']));
        $data['status'] = $data['status'] === null ? 1 : $data['status'];
        Client::create($data);
        return redirect()->route('clients');
    }

    public function search(Request $request) {
        $data = $request->all()['data'];
        $client = Client::find((int)$data);
        return $client->toArray();
    }

    public function show($id) {
        $client = Client::find($id);
        return view('clients.show', compact('client'));
    }

    public function destroy($id)
    {
        Client::destroy($id);
        return redirect()->route('clients');
    }
}
