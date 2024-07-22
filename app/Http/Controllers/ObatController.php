<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
        $obats = obat::with('kategoris')->get();
        return view('obat.index', compact(['data', 'obats']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
        $kategoris = Kategori::all();
        return view('obat.create', compact('data', 'kategoris'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'id_obat' => 'required|max:255',
                'nama_obat' => 'required|max:255',
                'id_kategori' => 'required',
                'harga' => 'required|max:255',
                'quantity' => 'required|max:255',
            ],
            [
                'id_obat.required' => 'ID harus diisi',
                'id_obat.unique' => 'ID sudah ada',
                'id_obat.max' => 'ID maksimal 255 karakter',
                'nama_obat.required' => 'Nama harus diisi',
                'kategori.required' => 'Kategori harus diisi',
                'harga.required' => 'Harga harus diisi',
                'quantity.required' => 'Jumlah harus diisi',
            ]
            );
            Obat::create($validateData);
            return redirect('/obats');
    }
    public function edit(string $id)
    {
        //
        $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
        $obats = obat::find($id);
        $kategoris = Kategori::all();
        return view('obat.edit', compact('data', 'obats', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate(
            [
                'id_obat' => 'required|max:255',
                'nama_obat' => '',
                'id_kategori' => '',
                'harga' => '',
                'quantity' => '',
            ],
            [
                'id_obat.required' => 'ID harus diisi',
                'id_obat.unique' => 'ID sudah ada',
                'id_obat.max' => 'ID maksimal 255 karakter'
            ]
            );
            obat::where('id_obat', $id)->update($validateData);
            return redirect('/obats');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        obat::destroy($id);
        return redirect('/obats');
        
    }
}
