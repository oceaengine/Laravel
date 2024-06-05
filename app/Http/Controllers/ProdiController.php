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
        );
        Prodi::create($validateData);
        return redirect('/prodi');
    }
}