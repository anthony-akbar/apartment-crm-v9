<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsInfoController extends Controller
{
    public function index() {


        return view('settings.info.index');

    }
}
