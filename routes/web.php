<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;


Route::get('/', [CarController::class,'index'])->name('index');
Route::get('/listcar/{type}', [CarController::class,'list_car'])->name('listcar');

Route::get('/dashboard',function(){
    return view('dashboard.index');
})->name('dashboard');

Route::get('/dashboard/brand',[DashboardController::class,'get_brands'])->name('dashboard.brand');
Route::get('/dashboard/cars',[DashboardController::class,'get_cars'])->name('dashboard.cars');

Route::post('/add_brand',[DashboardController::class,'add_brand'])->name('add_brand');
Route::post('/add_car',[DashboardController::class,'add_car'])->name('add_car');

Route::get('/delete_brand/{id}',[DashboardController::class,'delete_brand'])->name('delete_brand');
Route::get('/delete_car/{id}',[DashboardController::class,'delete_car'])->name('delete_car');

Route::get('/edit_brand/{id}',[DashboardController::class,'edit_brand'])->name('edit_brand');
Route::get('/edit_car/{id}',[DashboardController::class,'edit_car'])->name('edit_car');

Route::post('/update_brand/{id}',[DashboardController::class,'update_brand'])->name('update_brand');
Route::post('/update_car/{id}',[DashboardController::class,'update_car'])->name('update_car');