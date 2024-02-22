<?php

use App\Http\Controllers\ApartmentsController;
use App\Http\Controllers\AptBookController;
use App\Http\Controllers\AptContractController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\DairyController;
use App\Http\Controllers\ParkBookController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\PaymentArticlesController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ReportController;
use App\Models\Client;
use App\Models\PaymentArticle;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Nwidart\Modules\Facades\Module;

// MAIN REMAINING
Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('home');
    Route::get('/search', [\App\Http\Controllers\DashboardController::class, 'search'])->name('main.search');

// APARTMENTS DONE (CHANGE MODAL)
    Route::group(['prefix' => 'apartments'], function () {
        Route::get('/search', [ApartmentsController::class, 'search'])->name('apartments.search');
        Route::get('/searchone', [ApartmentsController::class, 'searchOne'])->name('apartments.search.one');
    });
    Route::resource('apartments', ApartmentsController::class, ['names' => ['index' => 'apartments',
        'show' => 'apartments.show',
        'create' => 'apartments.create',
        'edit' => 'apartments.edit',
        'update' => 'apartments.update',
        'store' => 'apartments.store',
        'destroy' => 'apartments.delete',
        'update_all' => 'apartments.updateAll'
    ]]);

// DAIRY DONE
    Route::group(['prefix' => 'dairy'], function () {
        Route::controller(DairyController::class)->group(function () {
            Route::get('dairies-export', 'export')->name('dairies.export');
            Route::get('/search', [DairyController::class, 'search'])->name('dairy.search');
        });
    });
    Route::resource('dairy', DairyController::class, ['names' => ['index' => 'dairy',
        'show' => 'dairy.show',
        'create' => 'dairy.create',
        'edit' => 'dairy.edit',
        'update' => 'dairy.update',
        'store' => 'dairy.store',
        'destroy' => 'dairy.delete',]]);

// PARKING DONE
    Route::group(['prefix'=>'parkings'], function () {
       Route::get('/search', [ParkingController::class, 'search'])->name('parkings.search');
    });
    Route::resource('parkings', ParkingController::class, ['names' => ['index' => 'parking',
        'show' => 'parking.show',
        'create' => 'parking.create',
        'edit' => 'parking.edit',
        'update' => 'parking.update',
        'store' => 'parking.store',
        'destroy' => 'parking.delete',]]);

    // COMMERCIAL DONE
    Route::group(['prefix' => 'commercial'], function () {
        Route::get('/searchOne', [CommercialController::class, 'searchOne'])->name('commercial.search.one');
    });
    Route::resource('commercial', CommercialController::class);

// CLIENTS DONE
    Route::group(['prefix' => 'clients'], function () {
        Route::get('/search', [ClientController::class, 'search'])->name('clients.search');
        Route::get('/searchOne', [ClientController::class, 'searchOne'])->name('clients.searchOne');
    });
    Route::resource('clients', ClientController::class, ['names' => ['index' => 'clients',
        'show' => 'clients.show',
        'create' => 'clients.create',
        'edit' => 'clients.edit',
        'update' => 'clients.update',
        'store' => 'clients.store',
        'destroy' => 'clients.delete',]]);
// CONTRACTS
    Route::group(['prefix' => 'contracts'], function () {
        // APARTMENTS
        Route::group(['prefix' => 'apartment'], function () {
            Route::get('/download/{id}', [AptContractController::class, 'download'])->name('contracts.apartments.download');
            Route::get('/search', [AptContractController::class, 'search'])->name('contracts.apartments.search');
            Route::get('/find', [AptContractController::class, 'find'])->name('contracts.apartments.find');
        });
        Route::resource('apartment', AptContractController::class, [
            'names' => [
                'index' => 'contracts.apartments',
                'show' => 'contracts.apartments.show',
                'create' => 'contracts.apartments.create',
                'edit' => 'contracts.apartments.edit',
                'update' => 'contracts.apartments.update',
                'store' => 'contracts.apartments.store',
                'destroy' => 'contracts.apartments.delete',
            ]
        ]);


        // PARKING


        // COMMERCIAL


    });

// BOOKINGS
    Route::group(['prefix' => 'booking'], function () {
        // APARTMENTS
        Route::resource('apartments', AptBookController::class);

        Route::group(['prefix' => 'apartments'], function () {
            Route::get('/', [AptBookController::class, 'index'])->name('bookings.apartments');
            Route::get('/create', [AptBookController::class, 'create'])->name('booking.apartments.create');
            Route::post('/store', [AptBookController::class, 'store'])->name('booking.apartments.store');
            Route::post('/delete/{id}', [AptBookController::class, 'delete'])->name('booking.apartments.delete');
        });

        Route::resource('commercial', \App\Http\Controllers\ComBookController::class, [
            'names' => [
                'index' => 'booking.commercial',
                'show' => 'booking.commercial.show',
                'create' => 'booking.commercial.create',
                'edit' => 'booking.commercial.edit',
                'update' => 'booking.commercial.update',
                'store' => 'booking.commercial.store',
                'destroy' => 'booking.commercial.delete',
            ]
        ]);

        // PARKINGS
        Route::resource('parkings', ParkBookController::class, [
            'names' => [
                'index' => 'booking.parking',
                'show' => 'booking.parking.show',
                'create' => 'booking.parking.create',
                'edit' => 'booking.parking.edit',
                'update' => 'booking.parking.update',
                'store' => 'booking.parking.store',
                'destroy' => 'booking.parking.delete',
            ]
        ]);

    });



//ARTICLES
    Route::resource('articles', PaymentArticlesController::class);
//    Route::group(['prefix' => 'articles'], function () {
//
//        Route::get('/', [\App\Http\Controllers\PaymentArticlesController::class, 'index'])->name('articles');
//    });

// PAYMENTS
    Route::group(['prefix' => 'payments'], function () {
        Route::get('/', [PaymentsController::class, 'index'])->name('payments');
        Route::get('/create', [PaymentsController::class, 'create'])->name('payments.create');
        Route::post('/store', [PaymentsController::class, 'store'])->name('payments.store');
        Route::get('/download/{id}', [PaymentsController::class, 'download'])->name('payments.download');
        Route::group(['prefix' => 'search'], function () {
            Route::get('/contracts', [PaymentsController::class, 'searchContracts'])->name('payments.search.contracts');
        });
    });

    // AUTO

    Route::group(['prefix' => 'auto'], function () {
        Route::get('/', [AutoController::class, 'index'])->name('auto');
    });

// SETTINGS
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [\App\Http\Controllers\SettingsController::class, 'index'])->name('settings');

        // FILES
        Route::group(['prefix' => 'files'], function () {
            Route::get('/', [\App\Http\Controllers\SettingsFilesController::class, 'index'])->name('settings.files');
        });

        // APARTMENTS
        Route::group(['prefix' => 'apartments'], function () {
            Route::get('/create', [\App\Http\Controllers\SettingsApartmentController::class, 'create'])->name('settings.apartments.create');
        });

        // INFO
        Route::group(['prefix' => 'info'], function () {
            Route::get('/', [\App\Http\Controllers\SettingsInfoController::class, 'index'])->name('settings.info');
        });

        // REPORT
        Route::group(['prefix' => 'report'], function () {
            Route::get('/', [ReportController::class, 'index'])->name('settings.report');
            Route::post('/store', [ReportController::class, 'store'])->name('settings.store');
        });
    });

    Route::group(['prefix' => 'export'], function () {
        Route::get('/', [\App\Http\Controllers\ExportController::class, 'index'])->name('export');
        Route::get('/query', [\App\Http\Controllers\ExportController::class, 'query'])->name('export.query');
        Route::get('/export', [\App\Http\Controllers\ExportController::class, 'exportXls'])->name('export.export');
    });

    Route::group(['prefix' => 'report'], function () {
        Route::get('/', [ReportController::class, 'dashboard'])->name('report.dashboard');
    });

})->middleware(Authenticate::class);


Route::group(['prefix' => 'test'], function () {
    Route::post('/store', function (Request $request) {
        dd($request->all());
    })->name('test.store');
    Route::get('/', function () {

        $module = Module::find('Safe');
        dd($module);


        //return view('test');
        /*$spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Hello World !');

        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');

        dd('Finish');*/


        $articles = [
            'Оплата за квартиру',
            'Первоначальный взнос за квартиру',
            'Полная оплата за квартиру',
            'Оплата за нежилое помещение',
            'Первоначальный взнос за нежилое помещение',
            'Полная оплата за нежилое помещение',
            'Аванс за бронирование квартиры',
            'Аванс за бронирование парковочного места',
            'Аванс за бронирование нежилого помещение'
        ];
        foreach ($articles as $article) {
            \App\Models\PaymentArticle::create([
                'title' => $article,
                'table' => 'apt_contract'
            ]);
        }

        dd('Finish');
        $contract = \App\Models\AptContract::find(3);
        dump($contract);
        dump($contract->schedule->pluck('amount', 'date_of_payment')->toArray());

        dd(date('d.M.Y H:i'));

        $created_at = \Carbon\Carbon::parse('2023-07-29 12:12:32');
        dd($created_at->day . ' «' . $created_at->getTranslatedMonthName('Do MMMM') . '» ' . $created_at->year);

        setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');

        $num = 324252353;
        $numstr = \nikserg\Num2Str\Num2Str::convert($num);
        $array = explode(" ", $numstr);
        $numstr = '';
        for ($i = 0; $i < count($array) - 3; $i++) {
            $numstr .= $array[$i] . ' ';
        };
        dd($numstr);

        $client = Client::find(5);
        foreach ($client->contracts() as $contract) {
            dump($contract->toArray());
        }

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


Auth::routes();


Route::get('/tozala', function () {
    $schdeules = \App\Models\Schedule::all();
    foreach ($schdeules as $schdeule) {
        $schdeule->update([
            'status' => 'Не оплачено',
            'paid' => 0,
            'date_to_pay' => null
        ]);
    }
});
