<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    public function index() {
        $autos = Auto::all();
        return view('auto.index', compact('autos'));
    }
}
