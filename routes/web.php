<?php

use App\Http\Controllers\AirportController;
use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;

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

Route::get('/airports', [AirportController::class, 'index']);

Route::get('/flights', [FlightController::class, 'index']);
Route::get('/flights/create', [FlightController::class, 'create']);
Route::post('/flights/create', [FlightController::class, 'store']);
Route::get('/flights/{flight}/edit', [FlightController::class, 'edit']);
Route::put('/flights/{flight}/update', [FlightController::class, 'update']);
Route::delete('/flights/{flight}/delete', [FlightController::class, 'destroy']);
