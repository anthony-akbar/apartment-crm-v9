<?php

use App\Http\Controllers\ApartmentsController;
use App\Http\Controllers\AptContractController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DairyController;
use App\Http\Controllers\ParkingController;
use App\Models\Client;
use http\Client\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

// MAIN
Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
Route::group(['prefix' => 'dairy'], function () {
    Route::get('/', [DairyController::class, 'index'])->name('dairy');
    Route::post('/store', [DairyController::class, 'store'])->name('dairy.store');
    Route::post('/delete/{id}', [DairyController::class, 'delete'])->name('dairy.delete');
});

// APARTMENTS
Route::group(['prefix' => 'apartments'], function () {
    Route::get('/', [ApartmentsController::class, 'index'])->name('apartments');
    Route::get('/search', [ApartmentsController::class, 'search'])->name('apartments.search');
});

// PARKING
Route::group(['prefix' => 'parkings'], function () {
    Route::get('/', [ParkingController::class, 'index'])->name('parking');
});

// CLIENTS
Route::group(['prefix' => 'clients'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('clients');
    Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/store', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/search', [ClientController::class, 'search'])->name('clients.search');
    Route::get('/{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::delete('/{id}/delete', [ClientController::class, 'destroy'])->name('clients.delete');
});

// DAIRY
Route::controller(DairyController::class)->group(function () {
    Route::get('dairies-export', 'export')->name('dairies.export');
    Route::get('/search', [DairyController::class, 'search'])->name('dairy.search');
});

// CONTRACTS
Route::group(['prefix' => 'contracts'], function () {
    // APARTMENTS
    Route::group(['prefix' => 'apartments'], function () {
        Route::get('/', [AptContractController::class, 'index'])->name('contracts.apartments');
        Route::get('/download/{id}', [AptContractController::class, 'download'])->name('contracts.apartments.download');
        Route::get('/create', [AptContractController::class, 'create'])->name('contracts.apartments.create');
        Route::get('/search', [AptContractController::class, 'search'])->name('contracts.apartments.search');
        Route::get('/store', [AptContractController::class, 'store'])->name('contracts.apartments.store');
    });

    Route::get('/', [ContractController::class, 'index'])->name('contracts');
    Route::get('/create', [ContractController::class, 'create'])->name('contracts.create');
});


Route::group(['prefix' => 'test'], function () {
    Route::get('/', function () {

        setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
        dd(date('d.M.Y H:i'));

        $num = 324252353;
        $numstr = \nikserg\Num2Str\Num2Str::convert($num);
        $array = explode( " ",$numstr);
        $numstr = '';
        for ($i=0; $i<count($array)-3; $i++) {
            $numstr .= $array[$i] . ' ';
        };
        dd($numstr);

        $client = Client::find(5);
        foreach ($client->contracts() as $contract) {
            dump($contract->toArray());
        }

        // Load the template .docx file
        $templateFilePath = 'sample.docx';
        $templateProcessor = new TemplateProcessor($templateFilePath);

// Edit certain data in the template

        $client = Client::find(5);
        $apt = \App\Models\Appartment::find(25);

        $templateProcessor->setValue('firstname', $client->firstname . ' ');
        $templateProcessor->setValue('name', $client->name . ' ');
        $templateProcessor->setValue('fathersname', $client->fathersname);
        $templateProcessor->setValue('phone', $client->phone);
        $templateProcessor->setValue('given', $client->given);
        $templateProcessor->setValue('givendate', $client->givendate);
        $templateProcessor->setValue('birth', $client->birth);
        $templateProcessor->setValue('passportId', $client->passportId);
        $templateProcessor->setValue('address', $client->address);
        $templateProcessor->setValue('pin', $client->pin);

        $templateProcessor->setValue('number', $apt->number);
        $templateProcessor->setValue('sq', $apt->square);
        $templateProcessor->setValue('floor', $apt->floor);
        $templateProcessor->setValue('price', $apt->price);
        $templateProcessor->setValue('pricestr', str_replace(" рубля 00 копеек", "", \nikserg\Num2Str\Num2Str::convert($apt->price)));
        $templateProcessor->setValue('amountstr', str_replace(" рубля 00 копеек", "", \nikserg\Num2Str\Num2Str::convert($apt->total)));
        $templateProcessor->setValue('amount', $apt->total);
        $templateProcessor->setValue('rooms', $apt->rooms);

// Save to a new file with a specific name
        $newFilePath = $apt->id . '.docx';
        $templateProcessor->saveAs( 'storage/contracts/' . $apt->id . '.docx', $newFilePath);
        //$templateProcessor->saveAs(storage_path('contracts/' . $newFilePath));
        //dd(request()->root() . 'storage/contracts/' . $newFilePath);
        return redirect()->away(request()->root() . '/storage/contracts/' . $newFilePath);

        /*return view('test');
        $clients = \App\Models\Client::all();
        foreach ($clients as $client) {

            dump(strtotime($client->birth));
            dump(date("Y-m-d", strtotime($client->birth)));
            dd($client);*/
    });

});
/*Route::group(['prefix' => '{block}'], function () {
    Route::group(['prefix' => '{kv}'], function () {
        Route::get('/', function ($block, $kv) {
            dump($block);
            dd($kv);
        });
    });
});*/
