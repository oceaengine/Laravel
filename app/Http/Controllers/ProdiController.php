<?php

namespace App\Http\Controllers;

    use App\Models\Prodi;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\DB;

    class ProdiController extends Controller
    {
        public function index()
    {
        $data = ['Nama' => "Dinda", 'Foto' => "E020322092.jpg" ];
        $prodi = Prodi::all();
        return view('prodi.index', compact('data', 'prodi'));
    //Logika untuk menampilkan daftar data
    }

    public function create()
    {
        $data = ['Nama' => "Dinda", 'Foto' => "E020322092.jpg" ];
        return view('prodi.create', compact(['data']));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'nama_prodi' => 'required|unique:prodi|max:255'
            ],
            [
                'nama_prodi.required' => 'Nama Prodi harus diisi',
                'nama_prodi.unique' => 'Nama Prodi sudah ada',
                'nama_prodi.max' => 'Nama Prodi maksimal 255 karakter'
            ]
            
        );
        Prodi::create($validateData);
        return redirect('/prodi');
    }
    public function edit(String $id)
    {
        $data = ['Nama' => "Dinda", 'Foto' => "E020322092.jpg" ];
        $prodi = Prodi::find($id);
        return view('prodi.edit', compact(['data', 'prodi']));
    }
    public function update(Request $request, String $id)
    {
        $validateData = $request->validate(
            [
                'nama_prodi' => 'required|unique:prodi|max:255'
            ],
            [
                'nama_prodi.required' => 'Nama Prodi harus diisi',
                'nama_prodi.unique' => 'Nama Prodi sudah ada',
                'nama_prodi.max' => 'Nama Prodi maksimal 255 karakter'
            ]
            
        );
        Prodi::where('id', $id)->update($validateData);
        return redirect('/prodi');
    }
    public function destroy(String $id)
    {
        Prodi::destroy($id);
        return redirect('/prodi');
    }
}