<?php

namespace App\Http\Controllers;

use App\Models\AptBook;
use App\Models\Client;
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
}
