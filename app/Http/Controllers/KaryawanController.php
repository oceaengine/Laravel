<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
    {
        public function index()
    {
        $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
        $karyawans = Karyawan::all();
        return view('karyawan.index', compact('data', 'karyawans'));
    //Logika untuk menampilkan daftar data
    }

    public function create()
    {
        $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
        return view('karyawan.create', compact(['data']));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'nama_pengguna' => 'required|max:255',
                'id_role' => 'required|max:255'
            ],
            [
                'nama_pengguna.required' => 'Nama Karyawan harus diisi',
                'nama_pengguna.unique' => 'Nama Karyawan sudah ada',
                'nama_pengguna.max' => 'Nama Karyawan maksimal 255 karakter',
                'id_role.required' => 'Nama Karyawan harus diisi'
            ]
            
        );
        Karyawan::create($validateData);
        return redirect('/karyawans');
    }
    public function edit(String $id)
    {
        $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
        $karyawans = Karyawan::find($id);
        return view('karyawan.edit', compact(['data', 'karyawans']));
    }
    public function update(Request $request, String $id)
    {
        $validateData = $request->validate(
            [
                'nama_pengguna' => 'required|max:255',
                'id_role' => 'required|max:255'
                
            ],
            [
                'nama_pengguna.required' => 'Nama Karyawan harus diisi',
                'nama_pengguna.unique' => 'Nama Karyawan sudah ada',
                'nama_pengguna.max' => 'Nama Karyawan maksimal 255 karakter',
                'id_role.required' => 'Nama Karyawan harus diisi'
            ]
            
        );
        Karyawan::where('id', $id)->update($validateData);
        flash()->success('Data Berhasil diedit');
        return redirect('/karyawans');
    }
    public function destroy(String $id)
    {
        Karyawan::destroy($id);
        flash()->success('Data Berhasil dihapus');
        return redirect('/karyawans');
    }
}