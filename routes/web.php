<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;

Route::get('/', function () {
    $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
    return view('dashboard', compact('data'));
})->name('home')->middleware('auth');

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

// Route::get('/prodi', [ProdiController::class, 'index']);
// Route::get('/prodi/create', [ProdiController::class, 'create']);
// Route::post('/prodi', [ProdiController::class, 'store']);

Route::resource('/prodi', ProdiController::class)->except('index')->middleware('admin');
Route::get('/prodi', [ProdiController::class, 'index'])->middleware('auth');
Route::resource('/mahasiswa', MahasiswaController::class)->except('index')->middleware('admin');
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);