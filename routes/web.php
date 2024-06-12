<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use GuzzleHttp\Promise\Create;

Route::get('/', function () {
    $data = ['Nama' => "Dinda", 'Foto' => "E020322092.jpg" ];
    return view('dashboard', compact('data'));
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

// Route::get('/prodi', [ProdiController::class, 'index']);
// Route::get('/prodi/create', [ProdiController::class, 'create']);
// Route::post('/prodi', [ProdiController::class, 'store']);

Route::resource('/prodi', ProdiController::class);
Route::resource('/mahasiswa', MahasiswaController::class);