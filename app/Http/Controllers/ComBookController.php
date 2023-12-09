<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ComBook;
use App\Models\Commercial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComBookController extends Controller
{
    public function index() {

        $bookings = ComBook::all();
        return view('booking.commercials.index', compact('bookings'));
    }

    public function create() {

        $clients = Client::all();
        return view('booking.commercials.create', compact('clients'));
    }

    public function store(Request $request) {
        $data = $request->all();
        ComBook::create([
            'com_id'=>$data['com_id'],
            'client_id'=> $data['client_id'],
            'status' => 1,
            'until' => Carbon::parse($data['until'] ?? Carbon::now()->addDays(3))->format('Y-m-d'),
            'paid'=> $data['paid'] ?? 0
        ]);

        $apartment = Commercial::find($data['com_id']);
        $apartment->update([
            'client_id' => $data['client_id'],
            'status'=> 2
        ]);

        return redirect()->route('booking.commercial');
    }

    public function destroy($id) {
        $data = ComBook::find($id);

        $apartment = Commercial::find($data->com_id);
        $apartment->update([
            'status'=>1
        ]);
        $data->delete();
        return redirect()->route('booking.commercial');
    }
}
