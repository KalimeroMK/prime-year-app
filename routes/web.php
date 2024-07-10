<?php

use App\Http\Controllers\PrimeYearController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PrimeYearController::class,'showForm']);
Route::post('/submit-year', [PrimeYearController::class,'submitYear']);
Route::get('/fetch-data', [PrimeYearController::class,'fetchData']);
