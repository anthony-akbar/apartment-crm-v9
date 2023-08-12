<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\Safe\Http\Controllers\SafeController;

Route::group(['prefix'=>'safe'], function (){
  Route::get('/', [SafeController::class, 'index'])->name('safe.index');
  Route::get('/search', [SafeController::class, 'search'])->name('safe.search');
  Route::post('/store', [SafeController::class, 'store'])->name('safe.store');
  Route::post('/get', [SafeController::class, 'get'])->name('safe.get');
  Route::post('/delete/{id}', [SafeController::class, 'destroy'])->name('safe.delete');
});
