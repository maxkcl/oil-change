<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('home');
});
Route::post('/cars', [CarController::class, 'store']);
Route::get('/car/{car}', [CarController::class, 'show'])->name('car.show');