<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

# Show the form
Route::get('/', function () {
    return view('home');
});

# Handle submission
Route::post('/check', [CarController::class, 'store']);

# Show the result
Route::get('/result/{car}', [CarController::class, 'show'])->name('result.show');