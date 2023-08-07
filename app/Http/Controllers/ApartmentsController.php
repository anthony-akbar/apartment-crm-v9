<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentsController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();
        return view('apartments.index', compact('apartments'));
    }

    public function search() {
        $request = request()->all()['data'];
        $apartments = $request ? Apartment::where($request)->get() : Apartment::all();
        return view('apartments.table', compact('apartments'));

    }
}
