<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use App\Models\AptContract;
use App\Models\Client;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\XMLWriter;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Writer\Word2007;

class AptContractController extends Controller
{
    public function index()
    {
        $aptContracts = AptContract::all();
        return view('contracts.apartments.index', compact('aptContracts'));
    }

    public function show($id) {
        $contract = AptContract::find($id);
        return view('contracts.apartments.show', compact('contract'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('contracts.apartments.create', compact('clients'));
    }



    public function store(Request $request)
    {
        $data = $request->all();

        $apartment = Appartment::find($data['apt_id']);
        $apartment->update([
            'price' => $data['price'],
            'total' => $data['amount'],
            'status' => 'Sold'
        ]);

        $contract = AptContract::create([
            'apt_id' => $data['apt_id'],
            'client_id' => $data['client_id'],
            'price' => $data['price'],
            'amount' => $data['amount'],
            'paid' => 0,
            'debt' => 0,
            'days_missed' => 0
        ]);
        if (array_key_exists('schedule' , $data)) {

            if($data['first_payment'] !== null){
                Schedule::create([
                    'client_id' => $data['client_id'],
                    'contract_id' => $contract->id,
                    'amount' => $data['first_payment'],
                    'paid' => $data['first_payment'],
                    'status' => 'Перв.взнос',
                    'date_of_payment'=> Carbon::now()->format('Y-m-d')
                ]);
            }

            for($i=1; $i<(int)$data['schedule_status']; $i++){
                Schedule::create([
                    'client_id' => $data['client_id'],
                    'contract_id' => $contract->id,
                    'amount' => $data['schedule_amount'],
                    'paid' => 0,
                    'status' => 'Не оплачено',
                    'date_of_payment'=> Carbon::parse($data['schedule_start_date'])->addMonth($i)->format('Y-m-d')
                ]);
            }

            Schedule::create([
                'client_id' => $data['client_id'],
                'contract_id' => $contract->id,
                'amount' => $data['schedule_last_month'],
                'paid' => 0,
                'status' => 'Не оплачено',
                'date_of_payment'=> Carbon::parse($data['schedule_start_date'])->addMonth((int)$data['schedule_status'])->format('Y-m-d')
            ]);

        }



        return redirect()->route('contracts.apartments');
    }

    public function search(Request $request)
    {
        $data = $request->all()['data'];
        $apt = Appartment::find($data);
        return $apt->toArray();
    }

    public function download($id)
    {
        $contract = AptContract::find($id);
        $client = $contract->client;
        $apt = $contract->apartment;
        $created_at = \Carbon\Carbon::parse($contract->created_at);

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

        if ($apt->rooms === 1) {
            $roomsstr = 'одно';
        } else if ($apt->rooms === 2) {
            $roomsstr = 'двух';
        } else if ($apt->rooms === 3) {
            $roomsstr = 'трех';
        } else if ($apt->rooms === 4) {
            $roomsstr = 'четырех';
        }
        $templateProcessor->setValue('roomsstr', $roomsstr);


        $numstr = \nikserg\Num2Str\Num2Str::convert($apt->price);
        $array = explode(" ", $numstr);
        $numstr = '';
        for ($i = 0; $i < count($array) - 3; $i++) {
            $numstr .= $array[$i] . ' ';
        };
        $templateProcessor->setValue('pricestr', $numstr);

        $numstr = \nikserg\Num2Str\Num2Str::convert($apt->total);
        $array = explode(" ", $numstr);
        $numstr = '';
        for ($i = 0; $i < count($array) - 3; $i++) {
            $numstr .= $array[$i] . ' ';
        };
        $templateProcessor->setValue('amountstr', $numstr);

        $payments = [
            [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ],
            [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ],
            [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ],
            [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ],
            [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ],
            [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ],
            [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ],
            [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ]
            , [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ]
            , [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ]
            , [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ]
            , [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ], [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ], [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ], [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ]
            , [
                'date' => '12.04.2023',
                'amount' => '1 500 $'
            ],
        ];

        $newFilePath = $contract->id . '.docx';
        $templateProcessor->saveAs('storage/contracts/' . $contract->id . '.docx', $newFilePath);
        return redirect()->away(request()->root() . '/storage/contracts/' . $newFilePath);

    }
}
