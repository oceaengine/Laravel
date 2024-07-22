<?php

namespace App\Http\Controllers;

    use App\Models\Kategori;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\DB;

    class KategoriController extends Controller
    {
        public function index()
    {
        $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
        $kategoris = Kategori::all();
        return view('kategori.index', compact('data', 'kategoris'));
    //Logika untuk menampilkan daftar data
    }

    public function create()
    {
        $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
        return view('kategori.create', compact(['data']));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'nama_kategori' => 'required|max:255'
            ],
            [
                'nama_kategori.required' => 'Nama Kategori harus diisi',
                'nama_kategori.unique' => 'Nama Kategori sudah ada',
                'nama_kategori.max' => 'Nama Kategori maksimal 255 karakter'
                ]
            
        );
        Kategori::create($validateData);
        return redirect('/kategoris');
    }
    public function edit(String $id)
    {
        $data = ['nama' => "Dinda", 'foto' => "E020322092.jpg" ];
        $kategoris = Kategori::find($id);
        return view('kategori.edit', compact(['data', 'kategoris']));
    }
    public function update(Request $request, String $id)
    {
        $validateData = $request->validate(
            [
                'nama_kategori' => 'required|max:255'
            ],
            [
                'nama_kategori.required' => 'Nama Kategori harus diisi',
                'nama_kategori.unique' => 'Nama Kategori sudah ada',
                'nama_kategori.max' => 'Napma Kategori maksimal 255 karakter'
            ]
            
        );
        Kategori::where('id', $id)->update($validateData);
        flash()->success('Data Berhasil diedit');
        return redirect('/kategoris');
    }
    public function destroy(String $id)
    {
        Kategori::destroy($id);
        flash()->success('Data Berhasil dihapus');
        return redirect('/kategoris');
    }
}