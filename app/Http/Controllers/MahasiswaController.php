<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.index')
        -> with('mahasiswas', Mahasiswa::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create')
        ->with('dosens', Dosen::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => ['required', 'string', 'max:9', 'unique:mahasiswa,nip'],
            'nama' => ['required', 'string', 'max:150'],
            'alamat' => ['required', 'string', 'max:300'],
            'no_hp' => ['required', 'string', 'max:16'],
            'program_studi' => ['required', 'numeric'],
        ]);
        $mahasiswa = new Mahasiswa($validatedData);
        $mahasiswa->save();
        return redirect()->route('mahasiswaList')
            ->with('status', 'Mahasiswa berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($nip);
    if ($mahasiswa == null) {
        return back()->withErrors(['err_msg' => 'Mahasiswa tidak ditemukan!']);
    }
    return view('mahasiswa.detail')
        ->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($nip);
    if ($mahasiswa == null) {
        return back()->withErrors(['err_msg' => 'Mahasiswa tidak ditemukan!']);
    }
    return view('mahasiswa.edit')
        ->with('dosen', Dosen::all())
        ->with('mahasiswa', $mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validatedData = $request->validate([
            'nip' => ['required', 'string', 'max:9', 'unique:mahasiswa,nip'],
            'nama' => ['required', 'string', 'max:150'],
            'alamat' => ['required', 'string', 'max:300'],
            'no_hp' => ['required', 'string', 'max:16'],
            'program_studi' => ['required', 'numeric'],
        ]);

        $mahasiswa['nama'] = $validatedData['nama'];
        $mahasiswa['alamat'] = $validatedData['alamat'];
        $mahasiswa['no_hp'] = $validatedData['no_hp'];

        $mahasiswa->save();
        return redirect()->route('mahasiswaList')
            ->with('status', 'Mahasiswa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($nip);
    if ($mahasiswa == null) {
        return back()->withErrors(['err_msg' => 'Mahasiswa tidak ditemukan!']);
    }
    $mahasiswa->delete();
    return redirect()->route('mahasiswaList')
        ->with('status', 'Mahasiswa berhasil dihapus!');
    }
}
