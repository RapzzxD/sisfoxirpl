<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kela'])->except(['show']);
Route::resource('siswa', SiswaController::class)->except(['show']);
Route::resource('guru', GuruController::class)->except(['show']);
Route::resource('mapel', MataPelajaranController::class)->except(['show']);
Route::resource('nilai', NilaiController::class)->except(['show']);