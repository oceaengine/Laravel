<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;

Route::get('/', function () {
    $data = ['Nama' => "Dinda", 'Foto' => "E020322092.jpg" ];
    return view('dashboard', compact('data'));
});

Route::get('/mahasiswa', 'App\Http\Controllers\MahasiswaController@index');
Route::get('/prodi', 'App\Http\Controllers\ProdiController@index');