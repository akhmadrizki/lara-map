<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kecamatans = Kecamatan::latest()->get();
        return view('interfaces.dashboard.kecamatan-lists')->withKecamatans($kecamatans);
    }

    public function add()
    {
        return view('interfaces.dashboard.add-kecamatan');
    }

    public function store(Request $request)
    {
        $field = ['nama_kecamatan' => $request->nama_kecamatan];
        Kecamatan::create($field);

        return redirect()->route('index.kecamatan')->with('success', 'Kecamatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kecamatans = Kecamatan::find($id);
        return view('interfaces.dashboard.edit-kecamatan')->withKecamatans($kecamatans);
    }

    public function update(Request $request, $id)
    {
        $kecamatans = Kecamatan::find($id);
        $field = ['nama_kecamatan' => $request->nama_kecamatan];

        $kecamatans->update($field);
        return redirect()->route('index.kecamatan')->with('success', 'Kecamatan berhasil diubah');
    }

    public function destroy($id)
    {
        $kecamatans = Kecamatan::find($id);
        $kecamatans->delete();

        return redirect()->route('index.kecamatan')->with('success', 'Kecamatan berhasil dihapus');
    }
}
