<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\AptBook;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AptBookController extends Controller
{
    public function index() {

        $bookings = AptBook::all();
        return view('booking.apartments.index', compact('bookings'));
    }

    public function create() {

        $clients = Client::all();
        return view('booking.apartments.create', compact('clients'));
    }

    public function store(Request $request) {
        $data = $request->all();

        AptBook::create([
            'apt_id'=>$data['apt_id'],
            'client_id'=> $data['client_id'],
            'status' => 1,
            'until' => Carbon::parse($data['until'])->format('Y-m-d'),
            'paid'=> $data['paid']
        ]);

        $apartment = Apartment::find($data['apt_id']);
        $apartment->update([
            'client_id' => $data['client_id'],
            'status'=> 2
            ]);

        return redirect()->route('bookings.apartments');
    }

    public function delete(Request $request) {


    }

}
