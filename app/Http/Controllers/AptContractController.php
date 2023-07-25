<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use Illuminate\Http\Request;

class AptContractController extends Controller
{
    public function index() {

        return view('contracts.apartments.index');
    }

    public function create() {

        return view('contracts.apartments.create');
    }

    public function search(Request $request) {
        $data = $request->all()['data'];
        $apt = Appartment::find($data[0]);
        return view('apartments.apt-details', compact('apt'));
    }
}
