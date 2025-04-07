<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class suratpengantar_mkController extends Controller
{
    public function index()
    {
        return view('suratpengantar_mk')-> with('suratpengantar_mks', suratpengantar_mk::all());
    }
    public function create()
    {
        return view('suratpengantar_mk.create');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_suratpengantar_mk' => 'required|unique:suratpengantar_mk',
            'ditujukan_kepada' => 'required|string',
            'kodeMk-namaMK' => 'required|string',
            'semester' => 'required|string',
            'anggota' => 'required|string',
            'tujuan' => 'required|string',
            'topik' => 'required|string',
            'status' => 'required|string',
            'nip' => 'required|string|max:9',
            'nama' => 'required|string|max:255'
        ]);
        suratpengantar_mk::create($validateData);
        return redirect('/suratpengantar_mk')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $suratpengantar_mk = suratpengantar_mk::find($id);
        return view('suratpengantar_mk.edit', compact('suratpengantar_mk'));
    }
    public function show(Keterangan_lulus $suratpengantar_mk)
    {
        //
    }
    public function update(Request $request, Keterangan_lulus $suratpengantar_mk)
    {
        $validateData = $request->validate([
            'id_suratpengantar_mk' => ['required', Rule::unique('suratpengantar_mk')->ignore($suratpengantar_mk->id_suratpengantar_mk, 'id_suratpengantar_mk')],
            'ditujukan_kepada' => 'required|string',
            'kodeMk-namaMK' => 'required|string',
            'semester' => 'required|string',
            'anggota' => 'required|string',
            'tujuan' => 'required|string',
            'topik' => 'required|string',
            'status' => 'required|string',
            'nip' => 'required|string|max:9',
            'nama' => 'required|string|max:255'
        ]);
        $suratpengantar_mk->update($validateData);
        return redirect('/suratpengantar_mk')->with('success', 'Data berhasil diubah');
    }
    public function destroy(Keterangan_lulus $suratpengantar_mk)
    {
        $suratpengantar_mk->delete();
        return redirect('/suratpengantar_mk')->with('success', 'Data berhasil dihapus');
    }
}
