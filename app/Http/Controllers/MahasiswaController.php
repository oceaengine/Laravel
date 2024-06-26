<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
        $mahasiswa = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact(['data', 'mahasiswa']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact(['data', 'prodi']));
    }

    public function store(Request $request)
    {
        //
        $validateData = $request->validate(
            [
                'nim' => 'required|unique:mahasiswa|max:255',
                'nama' => 'required|max:255',
                'prodi_id' => 'required',
                'no_hp' => 'required|max:255',
                'alamat' => 'required|max:255',
                'foto' => 'image|file|max:2048'
            ],
            [
                'nim.required' => 'NIM harus diisi',
                'nim.unique' => 'NIM sudah ada',
                'nim.max' => 'NIM maksimal 255 karakter',
                'nama.required' => 'Nama harus diisi',
                'prodi_id.required' => 'Prodi harus diisi',
                'no_hp.required' => 'No Hp harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'foto.image' => 'Tolong upload file foto',
                'foto.max' => 'Ukuran foto maksimal 2mb',
            ]
            );
            
            if($request->file('foto')){
                $validateData['foto'] = $request->file('foto')->store('images');
            }
            $validateData['password'] = Hash::make($validateData['nim']);
            Mahasiswa::create($validateData);
            return redirect('/mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
        $mahasiswa = Mahasiswa::find($id);
        $prodi = Prodi::all();
        return view('mahasiswa.edit', compact(['data', 'mahasiswa', 'prodi']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate(
            [
                'nim' => 'required|max:255',
                'nama' => '',
                'prodi_id' => '',
                'no_hp' => '',
                'alamat' => '',
            ],
            [
                'nim.required' => 'NIM harus diisi',
                'nim.unique' => 'NIM sudah ada',
                'nim.max' => 'NIM maksimal 255 karakter'
            ]
            );
            $mahasiswa = Mahasiswa::find($id);
            if($request->file('foto')){
                if($mahasiswa->foto) {
                    Storage::delete($mahasiswa->foto);
                }
            $validateData['foto'] = $request->file('foto')->store('images');
            }
            $validateData['password'] = Hash::make($validateData['nim']);
            Mahasiswa::where('nim', $id)->update($validateData);
            return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa->foto) {
            Storage::delete($mahasiswa->foto);
        }
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa');
        
    }
}
