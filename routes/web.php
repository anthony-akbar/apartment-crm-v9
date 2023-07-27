<?php

use App\Http\Controllers\ApartmentsController;
use App\Http\Controllers\AptContractController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DairyController;
use App\Http\Controllers\ParkingController;
use Illuminate\Support\Facades\Route;

// MAIN
Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
Route::group(['prefix'=>'dairy'], function (){
    Route::get('/', [DairyController::class, 'index'])->name('dairy');
    Route::post('/store', [DairyController::class, 'store'])->name('dairy.store');
    Route::post('/delete/{id}', [DairyController::class, 'delete'])->name('dairy.delete');
});

// APARTMENTS
Route::group(['prefix'=>'apartments'], function (){
    Route::get('/', [ApartmentsController::class, 'index'])->name('apartments');
    Route::get('/search', [ApartmentsController::class, 'search'])->name('apartments.search');
});

// PARKING
Route::group(['prefix'=>'parkings'], function () {
    Route::get('/',[ParkingController::class, 'index'])->name('parking');
});

// CLIENTS
Route::group(['prefix'=>'clients'], function (){
    Route::get('/', [ClientController::class, 'index'])->name('clients');
    Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/store', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/search', [ClientController::class, 'search'])->name('clients.search');
    Route::get('/{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::delete('/delete/{id}', [ClientController::class, 'destroy'])->name('clients.delete');
});

// DAIRY
Route::controller(DairyController::class)->group(function(){
    Route::get('dairies-export', 'export')->name('dairies.export');
    Route::get('/search', [DairyController::class, 'search'])->name('dairy.search');
});

// CONTRACTS
Route::group(['prefix'=>'contracts'], function (){
    // APARTMENTS
    Route::group(['prefix'=>'apartments'], function () {
        Route::get('/', [AptContractController::class, 'index'])->name('contracts.apartments');
        Route::get('/create', [AptContractController::class, 'create'])->name('contracts.apartments.create');
        Route::get('/search', [AptContractController::class, 'search'])->name('contracts.apartments.search');
    });

    Route::get('/', [ContractController::class, 'index'])->name('contracts');
    Route::get('/create', [ContractController::class, 'create'])->name('contracts.create');
});




Route::group(['prefix'=>'test'], function (){
    Route::get('/', function (){
        return view('test');
        $clients = \App\Models\Client::all();
        foreach ($clients as $client) {

            dump(strtotime($client->birth));
            dump(date("Y-m-d", strtotime($client->birth)));
            dd($client);
        }

    });
    Route::group(['prefix'=>'{block}'], function (){
        Route::group(['prefix'=>'{kv}'], function () {
            Route::get('/', function ($block, $kv){
                dump($block);
                dd($kv);
            });
        });
    });
});
