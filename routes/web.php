<?php

use App\Http\Controllers\BarangController; 
use Illuminate\Support\Facades\Route; 

Route::get('/', function () {return view('welcome');});
Route::get('/halo', function () {return 'Halo! Selamat datang di modul pemrograman web XI RPL.'; });  
Route::get('/barang', [BarangController::class, 'index']);  

route::get('/', [BarangController::class, 'dashboard'])->name('dashboard');
route::resource('barang', BarangController::class);