<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsApartmentController extends Controller
{
    public function create() {

        return view('settings.apartments.create');
    }
}
