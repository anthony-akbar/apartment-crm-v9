<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function index() {
        $parkings = Parking::all();
        return view('parking.index', compact('parkings'));
    }

    public function search(Request $request) {
        $parking = Parking::find($request->all()['data']);
        return $parking->toArray();
    }
}
