<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\StationController;

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

Route::get('/', function () {
    return view('welcome');
});

//
//Route::view('/home', 'layouts.home')->middleware('auth');

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/add-train', [TrainController::class, 'addTrain'])->name('add-train');
    Route::post('/add-train', [TrainController::class, 'storeTrain'])->name('add-train');

    Route::get('/stations', [StationController::class, 'stations']);

    Route::get('/trains', [TrainController::class, 'trains'])->name('trains');
    Route::get('/trains/show/{id}', [TrainController::class, 'show'])->name('trains.show');
});

