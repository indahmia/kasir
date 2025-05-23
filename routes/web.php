<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DiskonController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('barang', BarangController::class);
Route::resource('transaksi', TransaksiController::class);

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::get('/transaksi/{id}/cetak', [TransaksiController::class, 'cetakNota'])->name('transaksi.cetak');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/diskon', [DiskonController::class, 'index'])->name('diskon.index');
Route::post('/diskon/update', [DiskonController::class, 'update'])->name('diskon.update');