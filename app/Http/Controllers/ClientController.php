<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create() {
        return view('clients.create');
    }

    public function edit($id) {
        $client = Client::find($id)->toArray();
        $client['birth'] = Carbon::parse($client['birth'])->format('d M. Y');
        $client['givendate'] = Carbon::parse($client['givendate'])->format('d M. Y');
        return view('clients.edit', compact('client'));
    }

    public function update() {
        return response()->json(['message' => 'Item not found'], 404);
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

    public function searchOne(Request $request) {
        $data = $request->all()['data'];
        if($data) {
            $clients = Client::where('firstname', 'LIKE', '%' . $data . '%')->
            orWhere('name', 'LIKE', '%' . $data . '%')->
            orWhere('fathersname', 'LIKE', '%' . $data . '%')->get();
        }else {
            $clients = null;
        }
        return view('contracts.apartments.client-tooltip', compact('clients'))->render();
    }
}
