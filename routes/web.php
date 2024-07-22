<?php

use App\Models\Obat;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
    return view('dashboard', compact('data'));
    })->name('home')->middleware('auth');

Route::get('/obats', [ObatController::class, 'index']);

Route::resource('/karyawans', KaryawanController::class)->except('index')->middleware('admin');
Route::get('/karyawans', [KaryawanController::class, 'index'])->middleware('auth');
Route::resource('/obats', ObatController::class)->except('index')->middleware('admin');
Route::get('/obats', [ObatController::class, 'index'])->middleware('auth');
Route::resource('/kategoris', KategoriController::class)->except('index')->middleware('admin');
Route::get('/kategoris', [KategoriController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);