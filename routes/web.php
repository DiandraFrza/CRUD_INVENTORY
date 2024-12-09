<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified']) // Middleware buat ngecek apakah user udah login dan emailnya udah terverifikasi
    ->name('dashboard'); // Nama rute untuk akses dashboard

// Rute yang hanya bisa diakses kalo user udah login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Rute untuk ngedit profile
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Rute untuk update profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Rute buat hapus profile
});

// Rute untuk CRUD items yang juga cuma bisa diakses kalo udah login
Route::middleware(['auth'])->group(function () {
    Route::resource('items', ItemController::class); // Ini bakal ngatur rute CRUD (Create, Read, Update, Delete) buat Item
});

// Rute untuk halaman utama (home) yang bisa diakses tanpa login
Route::get('/', function () {
    return view('index'); // Kirim ke halaman index (biasanya halaman home)
});

require __DIR__ . '/auth.php'; // Nge-load file auth.php yang udah disediakan Laravel, buat rute autentikasi
