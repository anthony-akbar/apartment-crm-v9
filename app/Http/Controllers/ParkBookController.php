<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ParkBook;
use App\Models\Parking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParkBookController extends Controller
{
    public function index() {
        $bookings = ParkBook::all();
        $clients = Client::all();
        return view('booking.parkings.index', compact('bookings', 'clients'));
    }

    public function store(Request $request) {
        $data  = $request->all();
        ParkBook::create([
           'park_id' => $data['number'],
            'status' =>1,
            'paid' => $data['paid'],
            'client_id' => $data['client_id'],
            'until' => Carbon::parse($data['until'] ?? Carbon::now()->addDays(3))->format('Y-m-d')
        ]);

        $parking = Parking::find($data['number']);
        $parking->update([
            'status' =>2,
            'client_id' => $data['client_id']
        ]);
        return redirect()->route('booking.parking');
    }
}
