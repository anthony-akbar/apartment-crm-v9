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

    public function search() {
        if(request()->all()['data'] === null){
            return null;
        }
        $parking = Parking::find(request()->all()['data']);
        $data = $parking->toArray();
        unset($data['client_id']);
        if($parking->client_id !== null){
            $data['client'] = $parking->client()[0]->toArray();
        }
        return $data;
    }
}
