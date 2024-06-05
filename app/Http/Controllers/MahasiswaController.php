<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = ['Nama' => "Dinda", 'Foto' => "E020322092.jpg" ];
        $mahasiswa = DB::table('mahasiswa')->get();
        return view('mahasiswa', compact(['data', 'mahasiswa']));
    }
    public function show($id)
    {

    }
}