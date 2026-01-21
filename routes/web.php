<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PesertaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
Route::post('/pendaftaran', [PendaftaranController::class, 'store']);

Route::get('/pendaftaran-uinsu', [PendaftaranController::class, 'indexUinsu']);
Route::post('/pendaftaran-uinsu', [PendaftaranController::class, 'storeUinsu']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']); 

    Route::get('/daftar-peserta', [PesertaController::class, 'index']);
    Route::get('/daftar-peserta/edit', [PesertaController::class, 'edit']);
    Route::post('/daftar-peserta/store', [PesertaController::class, 'store']);
    Route::post('/daftar-peserta/update/{id}', [PesertaController::class, 'update']);
    Route::post('/daftar-peserta/delete', [PesertaController::class, 'delete']);

    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/get', [PembayaranController::class, 'getPembayaran']);
    Route::post('/pembayaran/update/{id}', [PembayaranController::class, 'updatePembayaran']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginCheck']);
});