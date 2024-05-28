<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');
// export pdf
Route::post('produk/export-produk', [App\Http\Controllers\ProdukController::class, 'viewPDF'])->name('produk.view-pdf');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('merek', App\Http\Controllers\MerekController::class)->middleware('auth');
// export pdf
Route::post('merek/export-merek', [App\Http\Controllers\MerekController::class, 'viewPDF'])->name('merek.view-pdf');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('barang', App\Http\Controllers\BarangController::class)->middleware('auth');
// export pdf
Route::post('barang/export-barang', [App\Http\Controllers\BarangController::class, 'viewPDF'])->name('barang.view-pdf');
