<?php

namespace App\Http\Controllers;

use App\Models\Commercial;
use Illuminate\Http\Request;

class CommercialController extends Controller
{
    public function index() {

        $commercials = Commercial::all();
        return view('commercial.index', compact('commercials'));
    }
}
