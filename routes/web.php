<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\TahapDokumentasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dashboard', [HomeController::class, 'index'])->middleware('auth', 'admin');

Route::get('dashboard', [DokumentasiController::class, 'dashboardUser'])->name('dashboard');
Route::get('dokumentasi', [DokumentasiController::class, 'index']);
Route::get('dokumentasi.create', [DokumentasiController::class, 'create']);
Route::post('/dokumentasi/store', [DokumentasiController::class, 'store'])->name('dokumentasi.store');
Route::resource('/tahap', TahapDokumentasiController::class);
Route::get('/tahap/{id}/dokumentasi', [DokumentasiController::class, 'byTahap'])->name('dokumentasi.bytahap');
Route::resource('dokumentasi', DokumentasiController::class);

require __DIR__.'/auth.php';
