<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\AptContract;
use App\Models\Client;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use nikserg\Num2Str\Num2Str;
use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\TemplateProcessor;

class AptContractController extends Controller
{
    public function index()
    {
        $aptContracts = AptContract::all();
        return view('contracts.apartments.index', compact('aptContracts'));
    }

    public function show($id)
    {
        $contract = AptContract::find($id);
        return view('contracts.apartments.show', compact('contract'));
    }

    public function create(Request $request)
    {
        if ($request->all()) {
            $apt_id = $request->all()['apt_id'] ?? null;
            $client_id = $request->all()['client_id'] ?? null;
            $clients = Client::all();
            return view('contracts.apartments.create', compact('clients', 'client_id', 'apt_id'));
        }
        $clients = Client::all();
        return view('contracts.apartments.create', compact('clients'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $apartment = Apartment::find($data['apt_id']);
        $apartment->update([
            'price' => $data['price'],
            'total' => $data['amount'],
            'status' => 3,
            'client_id' => $data['client_id']
        ]);
        dump($data);
        if($data['currency'] === 'KGS') {
            $contract = AptContract::create([
                'apt_id' => $data['apt_id'],
                'client_id' => $data['client_id'],
                'price' => $data['price'] * $data['currency-value'],
                'amount' => $data['amount'] * $data['currency-value'],
                'paid' => 0,
                'currency' => $data['currency'],
                'debt' => $data['amount'] * $data['currency-value'],
                'days_missed' => array_key_exists('schedule_charges_free', $data) ? $data['schedule_charges_free'] : 0,
            ]);
        }else {
            $contract = AptContract::create([
                'apt_id' => $data['apt_id'],
                'client_id' => $data['client_id'],
                'price' => $data['price'],
                'amount' => $data['amount'],
                'paid' => 0,
                'currency' => $data['currency'],
                'debt' => $data['amount'],
                'days_missed' => array_key_exists('schedule_charges_free', $data) ? $data['schedule_charges_free'] : 0,
            ]);
        }

        if (array_key_exists('schedule', $data)) {
            if ($data['first_payment'] !== null) {
                Schedule::create([
                    'client_id' => $data['client_id'],
                    'contract_id' => $contract->id,
                    'amount' => $data['first_payment'],
                    'paid' => $data['first_payment'],
                    'status' => 'Перв.взнос'
                ]);
            }

            for ($i = 0; $i < (int)$data['schedule_status']; $i++) {
                Schedule::create([
                    'client_id' => $data['client_id'],
                    'contract_id' => $contract->id,
                    'amount' => $data['schedule_amount'],
                    'paid' => 0,
                    'status' => 'Не оплачено',
                    'date_of_payment' => Carbon::parse($data['schedule_start_date'])->addMonth($i)->format('Y-m-d')
                ]);
            }

            Schedule::create([
                'client_id' => $data['client_id'],
                'contract_id' => $contract->id,
                'amount' => $data['schedule_last_month'],
                'paid' => 0,
                'status' => 'Не оплачено',
                'date_of_payment' => Carbon::parse($data['schedule_start_date'])->addMonth((int)$data['schedule_status'])->format('Y-m-d')
            ]);

        }

        return redirect()->route('contracts.apartments.show', $contract->id);
    }

    public function search(Request $request)
    {
        $data = $request->all()['data'];
        $apt = AptContract::find($data);
        return ['contract'=>$apt->toArray(),'apartment'=> $apt->apartment->toArray()];
    }

    /**
     * @throws CopyFileException
     * @throws CreateTemporaryFileException
     */
    public function download($id)
    {
        $contract = AptContract::find($id);
        $client = $contract->client;
        $apt = $contract->apartment;
        $created_at = Carbon::parse($contract->created_at);

        $templateFilePath = 'sample.docx';
        $templateProcessor = new TemplateProcessor($templateFilePath);

        $templateProcessor->setValue('date', $created_at->day . ' «' . $created_at->getTranslatedMonthName('Do MMMM') . '» ' . $created_at->year);
        $templateProcessor->setValue('contract_num', $contract->id);
        $templateProcessor->setValue('firstname', $client->firstname . ' ');
        $templateProcessor->setValue('name', $client->name . ' ');
        $templateProcessor->setValue('fathersname', $client->fathersname);
        $templateProcessor->setValue('phone', $client->phone);
        $templateProcessor->setValue('given', $client->given);
        $templateProcessor->setValue('givendate', date("d.m.Y", strtotime($client->givendate)));
        $templateProcessor->setValue('birth', date("d.m.Y", strtotime($client->birth)));
        $templateProcessor->setValue('passportId', $client->passportId);
        $templateProcessor->setValue('address', $client->address);
        $templateProcessor->setValue('pin', $client->pin);
        $templateProcessor->setValue('number', $apt->number);
        $templateProcessor->setValue('sq', $apt->square);
        $templateProcessor->setValue('floor', $apt->floor);
        $templateProcessor->setValue('price', $apt->price);
        $templateProcessor->setValue('amount', number_format($apt->total, 0, '.', ' '));
        $templateProcessor->setValue('rooms', $apt->rooms);
        $templateProcessor->setValue('email', $apt->client->email ?? '');

        $roomsstr = '';
        if ($apt->rooms === 1) {$roomsstr = 'одно';} else if ($apt->rooms === 2) {$roomsstr = 'двух';} else if ($apt->rooms === 3) {$roomsstr = 'трех';} else if ($apt->rooms === 4) {$roomsstr = 'четырех';}
        $templateProcessor->setValue('roomsstr', $roomsstr);

        $numstr = Num2Str::convert($apt->price);
        $array = explode(" ", $numstr);
        $numstr = '';
        for ($i = 0; $i < count($array) - 3; $i++) {
            $numstr .= $array[$i] . ' ';
        }
        $templateProcessor->setValue('pricestr', $numstr);

        $numstr = Num2Str::convert($apt->total);
        $array = explode(" ", $numstr);
        $numstr = '';
        for ($i = 0; $i < count($array) - 3; $i++) {
            $numstr .= $array[$i] . ' ';
        }
        $templateProcessor->setValue('amountstr', $numstr);

        $newFilePath = $contract->id . '.docx';
        $templateProcessor->saveAs('storage/contracts/' . $contract->id . '.docx');
        return redirect()->away(request()->root() . '/storage/contracts/' . $newFilePath);

    }

}
