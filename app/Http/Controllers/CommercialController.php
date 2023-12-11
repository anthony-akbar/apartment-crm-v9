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

    public function searchOne() {
        if(request()->all()['data'] === null){
            return null;
        }
        $commercial = Commercial::find(request()->all()['data']);
        $data = $commercial->toArray();
        unset($data['client_id']);
        if($commercial->client_id !== null){
            $data['client'] = $commercial->client()[0]->toArray();
        }
        return $data;
    }
}
