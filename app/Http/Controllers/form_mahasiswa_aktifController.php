<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class form_mahasiswa_aktifController extends Controller
{
    public function index()
    {
        return view('form_mahasiswa_aktif')-> with('form_mahasiswa_aktifs', form_mahasiswa_aktif::all());
    }
    public function create()
    {
        return view('form_mahasiswa_aktif.create');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_form_mahasiswa_aktif' => 'required|unique:form_mahasiswa_aktif',
            'semester' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'keperluan' => 'required|string',
            'status' => 'required|string',
            'nip' => 'required|string|max:9',
            'nama' => 'required|string|max:255'
        ]);
        form_mahasiswa_aktif::create($validateData);
        return redirect('/form_mahasiswa_aktif')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $form_mahasiswa_aktif = form_mahasiswa_aktif::find($id);
        return view('form_mahasiswa_aktif.edit', compact('form_mahasiswa_aktif'));
    }
    public function show(Keterangan_lulus $form_mahasiswa_aktif)
    {
        //
    }
    public function update(Request $request, Keterangan_lulus $form_mahasiswa_aktif)
    {
        $validateData = $request->validate([
            'id_form_mahasiswa_aktif' => ['required', Rule::unique('form_mahasiswa_aktif')->ignore($form_mahasiswa_aktif->id_form_mahasiswa_aktif, 'id_form_mahasiswa_aktif')],
            'semester' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'keperluan' => 'required|string',
            'status' => 'required|string',
            'nip' => 'required|string|max:9',
            'nama' => 'required|string|max:255'
        ]);
        $form_mahasiswa_aktif->update($validateData);
        return redirect('/form_mahasiswa_aktif')->with('success', 'Data berhasil diubah');
    }
    public function destroy(Keterangan_lulus $form_mahasiswa_aktif)
    {
        $form_mahasiswa_aktif->delete();
        return redirect('/form_mahasiswa_aktif')->with('success', 'Data berhasil dihapus');
    }
}
