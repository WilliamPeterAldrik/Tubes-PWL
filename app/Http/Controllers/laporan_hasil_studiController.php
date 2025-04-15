<?php

namespace App\Http\Controllers;
use App\Models\laporan_hasil_studi;
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
        $validatedData = $request->validate([
            'id_surat' =>'SRT-' . now()->format('YmdHis'),
            'keperluan' => 'required',
            'status' => 'required|in:pending,disetujui,ditolak',
            'nip' => 'required|max:9|String',
            'nama' => 'required|max:150|String',
        ]);

        $laporan_hasil_studi = new laporan_hasil_studi($validatedData);
        $laporan_hasil_studi->save();
        return redirect()->route('$laporan_hasil_studi-list')
          ->with('status', '$laporan_hasil_studi successfully added!');
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


