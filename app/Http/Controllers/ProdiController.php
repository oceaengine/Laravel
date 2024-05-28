<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\Controller;

    class ProdiController extends Controller
    {
        public function index()
    {
        $data = ['Nama' => "Dinda", 'Foto' => "E020322092.jpg" ];
        $prodi = DB::table('prodi')->get();
        return view('prodi', compact('data', 'prodi'));
    //Logika untuk menampilkan daftar data
    }
}
