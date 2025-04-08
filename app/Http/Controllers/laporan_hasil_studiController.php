<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class laporan_hasil_studiController extends Controller
{
    public function index()
    {
        return view('laporan_hasil_studi')-> with('laporan_hasil_studis', laporan_hasil_studi::all());
    }
    public function create()
    {
        return view('laporan_hasil_studi.create');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_laporan_hasil_studi' => 'required|unique:laporan_hasil_studi',
            'keperluan' => 'required|string',
            'status' => 'required|string',
            'nip' => 'required|string|max:9',
            'nama' => 'required|string|max:255'
        ]);
        laporan_hasil_studi::create($validateData);
        return redirect('/laporan_hasil_studi')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $laporan_hasil_studi = laporan_hasil_studi::find($id);
        return view('laporan_hasil_studi.edit', compact('laporan_hasil_studi'));
    }
    public function show(laporan_hasil_studi $laporan_hasil_studi)
    {
        //
    }
    public function update(Request $request, laporan_hasil_studi $laporan_hasil_studi)
    {
        $validateData = $request->validate([
            'id_laporan_hasil_studi' => ['required', Rule::unique('laporan_hasil_studi')->ignore($laporan_hasil_studi->id_laporan_hasil_studi, 'id_laporan_hasil_studi')],
            'keperluan' => 'required|string',
            'status' => 'required|string',
            'nip' => 'required|string|max:9',
            'nama' => 'required|string|max:255'
        ]);
        $laporan_hasil_studi->update($validateData);
        return redirect('/laporan_hasil_studi')->with('success', 'Data berhasil diubah');
    }
    public function destroy(laporan_hasil_studi $laporan_hasil_studi)
    {
        $laporan_hasil_studi->delete();
        return redirect('/laporan_hasil_studi')->with('success', 'Data berhasil dihapus');
    }
}


