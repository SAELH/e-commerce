<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;


Route::get('/', [CarController::class,'index'])->name('index');
Route::get('/listcar/{type}', [CarController::class,'list_car'])->name('listcar');
