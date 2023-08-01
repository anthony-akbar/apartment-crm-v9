<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use App\Models\AptContract;
use App\Models\Client;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class AptContractController extends Controller
{
    public function index()
    {
        $aptContracts = AptContract::all();
        return view('contracts.apartments.index', compact('aptContracts'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('contracts.apartments.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        AptContract::create([
            'apt_id' => $data['apt_id'],
            'client_id' => $data['client_id'],
            'price' => $data['price'],
            'amount' => $data['amount'],
            'paid' => 0,
            'debt' => 0,
            'days_missed' => 0
        ]);
        return redirect()->route('contracts.apartments');
    }

    public function search(Request $request)
    {
        $data = $request->all()['data'];
        $apt = Appartment::find($data);
        return view('apartments.apt-details', compact('apt'));
    }

    public function download($id) {

        $templateFilePath = 'sample.docx';
        $templateProcessor = new TemplateProcessor($templateFilePath);

        $contract = AptContract::find($id);

        $client = $contract->client;
        $apt = $contract->apartment;

        $templateProcessor->setValue('firstname', $client->firstname . ' ');
        $templateProcessor->setValue('name', $client->name . ' ');
        $templateProcessor->setValue('fathersname', $client->fathersname);
        $templateProcessor->setValue('phone', $client->phone);
        $templateProcessor->setValue('given', $client->given);
        $templateProcessor->setValue('givendate', date("d-m-Y", strtotime($client->givendate)));
        $templateProcessor->setValue('birth', date("d-m-Y", strtotime($client->birth)));
        $templateProcessor->setValue('passportId', $client->passportId);
        $templateProcessor->setValue('address', $client->address);
        $templateProcessor->setValue('pin', $client->pin);

        $templateProcessor->setValue('number', $apt->number);
        $templateProcessor->setValue('sq', $apt->square);
        $templateProcessor->setValue('floor', $apt->floor);
        $templateProcessor->setValue('price', $apt->price);
        $templateProcessor->setValue('amount', $apt->total);
        $templateProcessor->setValue('rooms', $apt->rooms);

        if ($apt->rooms === 1) {
            $roomsstr = 'одно';
        }else if ($apt->rooms === 2) {
            $roomsstr = 'двух';
        }else if ($apt->rooms === 3) {
            $roomsstr = 'трех';
        }else if ($apt->rooms === 4) {
            $roomsstr = 'четырех';
        }
        $templateProcessor->setValue('roomsstr', $roomsstr);


        $numstr = \nikserg\Num2Str\Num2Str::convert($apt->price);
        $array = explode( " ",$numstr);
        $numstr = '';
        for ($i=0; $i<count($array)-3; $i++) {
            $numstr .= $array[$i] . ' ';
        };

        $templateProcessor->setValue('pricestr', $numstr);

        $numstr = \nikserg\Num2Str\Num2Str::convert($apt->total);
        $array = explode( " ",$numstr);
        $numstr = '';
        for ($i=0; $i<count($array)-3; $i++) {
            $numstr .= $array[$i] . ' ';
        };

        $templateProcessor->setValue('amountstr', $numstr);

        $newFilePath = $contract->id . '.docx';
        $templateProcessor->saveAs( 'storage/contracts/' . $contract->id . '.docx', $newFilePath);
        return redirect()->away(request()->root() . '/storage/contracts/' . $newFilePath);

    }
}
