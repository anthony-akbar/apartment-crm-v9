<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ComBook;
use Illuminate\Http\Request;

class ComBookController extends Controller
{
    public function index() {

        $bookings = ComBook::all();
        return view('booking.apartments.index', compact('bookings'));
    }

    public function create() {

        $clients = Client::all();
        return view('booking.apartments.create', compact('clients'));
    }
}
