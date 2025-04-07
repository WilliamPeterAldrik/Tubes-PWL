<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class keterangan_lulusController extends Controller
{
    public function index()
    {
        return view('keterangan_lulus')-> with('keterangan_luluss', keterangan_lulus::all());
    }
    public function create()
    {
        return view('keterangan_lulus.create');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_surat_keterangan_lulus' => 'required|unique:surat_keterangan_lulus',
            'tgl_lulus' => 'required|date',
            'status' => 'required|string',
            'nip' => 'required|string|max:9',
            'nama' => 'required|string|max:255'
        ]);
        keterangan_lulus::create($validateData);
        return redirect('/keterangan_lulus')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $keterangan_lulus = keterangan_lulus::find($id);
        return view('keterangan_lulus.edit', compact('keterangan_lulus'));
    }
    public function show(Keterangan_lulus $keterangan_lulus)
    {
        //
    }
    public function update(Request $request, Keterangan_lulus $keterangan_lulus)
    {
        $validateData = $request->validate([
            'id_surat_keterangan_lulus' => ['required', Rule::unique('surat_keterangan_lulus')->ignore($keterangan_lulus->id_surat_keterangan_lulus, 'id_surat_keterangan_lulus')],
            'tgl_lulus' => 'required|date',
            'status' => 'required|string',
            'nip' => 'required|string|max:9',
            'nama' => 'required|string|max:255'
        ]);
        $keterangan_lulus->update($validateData);
        return redirect('/keterangan_lulus')->with('success', 'Data berhasil diubah');
    }
    public function destroy(Keterangan_lulus $keterangan_lulus)
    {
        $keterangan_lulus->delete();
        return redirect('/keterangan_lulus')->with('success', 'Data berhasil dihapus');
    }
}
