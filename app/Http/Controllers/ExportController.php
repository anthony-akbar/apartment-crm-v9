<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\AptContract;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JoggApp\GoogleTranslate\GoogleTranslateClient;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function index() {
        $contract = AptContract::find(1);
        $clients = $contract->client()->get();
        $apartments = $contract->apartment()->get();
        $schedules = $contract->schedule();


        $client = $clients[0]->toArray();
        $apartment = $apartments[0]->toArray();

        return view('export.index', compact('client', 'apartment'));
    }

    public function query($data = null)
    {
        $data = request()->all()['data'];

        $tables = $data['tables'];
        $datas = $data['data'];

        $contracts = AptContract::all();
        $contract_array = [];

        foreach ($contracts as $contract_key => $contract) {
            $contract_array[] = [
                'contract' => $contract->toArray(),
                'client' => $contract->client()->get()->toArray()[0],
                'apartment' => $contract->apartment()->get()->toArray()[0]
            ];
        }
        $keys = $datas;
        return view('export.table_result', compact('contract_array', 'keys'));

    }

    public function exportXls() {
        $data = request()->all()['data'];

        $data = json_decode($data);
        dd($data);


        $htmlString = $this->query($data);

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
        $spreadsheet = $reader->loadFromString($htmlString);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        //$writer->save('export.xls');

        $response =  new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="ExportScan.xls"');
        $response->headers->set('Cache-Control','max-age=0');

        return  $response;
    }
}
