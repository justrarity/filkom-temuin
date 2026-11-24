<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\AuthController;

// Halaman publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/katalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/barang/{item}', [CatalogController::class, 'show'])->name('catalog.show');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grup Security
Route::middleware(['auth', 'role:security'])->prefix('security')->name('security.')->group(function () {
    // Sementara, diganti di Tahap 9
    Route::get('items', function () {
        return view('placeholder', ['judul' => 'Dashboard Security']);
    })->name('items.index');
});

// Grup Pelapor OB (role di database: pelapor)
Route::middleware(['auth', 'role:pelapor'])->prefix('ob')->name('ob.')->group(function () {
    // Sementara, diganti di Tahap 11
    Route::get('laporan/buat', function () {
        return view('placeholder', ['judul' => 'Dashboard Pelapor']);
    })->name('reports.create');
});