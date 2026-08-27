<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('home');
});
Route::post('/check', [CarController::class, 'store']);
Route::get('/result/{car}', [CarController::class, 'show'])->name('result.show');