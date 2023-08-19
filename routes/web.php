<?php

use App\Http\Controllers\ApartmentsController;
use App\Http\Controllers\AptBookController;
use App\Http\Controllers\AptContractController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DairyController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\PaymentsController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpWord\TemplateProcessor;


// MAIN
Route::group(['prefix' => '/'], function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('home');
    Route::get('/search', [\App\Http\Controllers\DashboardController::class, 'search'])->name('main.search');
});

// APARTMENTS
Route::group(['prefix' => 'apartments'], function () {
    Route::get('/', [ApartmentsController::class, 'index'])->name('apartments');
    Route::get('/search', [ApartmentsController::class, 'search'])->name('apartments.search');
    Route::get('/searchone', [ApartmentsController::class, 'searchOne'])->name('apartments.search.one');

});

// DAIRY
Route::group(['prefix' => 'dairy'], function () {
    Route::get('/', [DairyController::class, 'index'])->name('dairy');
    Route::post('/store', [DairyController::class, 'store'])->name('dairy.store');
    Route::post('/delete/{id}', [DairyController::class, 'delete'])->name('dairy.delete');
    Route::controller(DairyController::class)->group(function () {
        Route::get('dairies-export', 'export')->name('dairies.export');
        Route::get('/search', [DairyController::class, 'search'])->name('dairy.search');
    });
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

// CONTRACTS
Route::group(['prefix' => 'contracts'], function () {
    // APARTMENTS
    Route::group(['prefix' => 'apartment'], function () {
        Route::get('/', [AptContractController::class, 'index'])->name('contracts.apartments');
        Route::get('/create', [AptContractController::class, 'create'])->name('contracts.apartments.create');
        Route::get('/download/{id}', [AptContractController::class, 'download'])->name('contracts.apartments.download');
        Route::get('/search', [AptContractController::class, 'search'])->name('contracts.apartments.search');
        Route::get('/store', [AptContractController::class, 'store'])->name('contracts.apartments.store');
        Route::get('/{id}', [AptContractController::class, 'show'])->name('contracts.apartments.show');
    });

});

// BOOKINGS
Route::group(['prefix' => 'booking'], function () {
    // APARTMENTS
    Route::group(['prefix' => 'apartments'], function () {
        Route::get('/', [AptBookController::class, 'index'])->name('bookings.apartments');
        Route::get('/create', [AptBookController::class, 'create'])->name('booking.apartments.create');
        Route::post('/store', [AptBookController::class, 'store'])->name('booking.apartments.store');
    });
});

//ARTICLES
Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [\App\Http\Controllers\PaymentArticlesController::class, 'index'])->name('articles');
});

// PAYMENTS
Route::group(['prefix' => 'payments'], function () {
    Route::get('/', [PaymentsController::class, 'index'])->name('payments');
    Route::get('/create', [PaymentsController::class, 'create'])->name('payments.create');
    Route::post('/store', [PaymentsController::class, 'store'])->name('payments.store');
    Route::group(['prefix' => 'search'], function () {
        Route::get('/contracts', [PaymentsController::class, 'searchContracts'])->name('payments.search.contracts');
    });
});

// SETTINGS
Route::group(['prefix' => 'settings'], function () {
   Route::get('/', [\App\Http\Controllers\SettingsController::class, 'index'])->name('settings');

   // FILES
    Route::group(['prefix' => 'files'], function () {
       Route::get('/', [\App\Http\Controllers\SettingsFilesController::class, 'index'])->name('settings.files');
    });
});



Route::group(['prefix' => 'test'], function () {
    Route::get('/', function () {

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
