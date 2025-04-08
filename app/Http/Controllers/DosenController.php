<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dosen.index')
            -> with('dosens', Dosen::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'nip' => ['required', 'string', 'max:9', 'unique:dosen,nip'],
            'nama' => ['required', 'string', 'max:150'],
            'no_hp' => ['required', 'string', 'max:16'],
            'email' => ['required', 'string', 'email', 'max:300', 'unique:dosen.email'],
            'program_studi' => ['required', 'numeric'],
        ]) -> validate();
        $dosen = new Dosen($validatedData);
        $dosen -> save();
        return redirect(route('dosenList'))
        ->with('success', 'Dosen berhasil diupdate');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        $dosen = Dosen::find($nip);
    if ($dosen == null) {
        return back()->withErrors(['err_msg' => 'Dosen tidak ditemukan!']);
    }
    return view('dosen.detail')
        ->with('dosen', $dosen);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit')
        ->with('dosen', $dosen);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $validatedData = $request->validate([
            'nip' => ['required', 'string', 'max:9', 'unique:dosen,nip'],
            'nama' => ['required', 'string', 'max:150'],
            'no_hp' => ['required', 'string', 'max:16'],
            'email' => ['required', 'string', 'email', 'max:300', 'unique:dosen.email'],
            'program_studi' => ['required', 'numeric'],
        ]);

        $dosen['nama'] = $validatedData['nama'];
        $dosen['no_hp'] = $validatedData['no_hp'];
        $dosen['email'] = $validatedData['email'];
        $dosen['program_studi'] = $validatedData['program_studi'];

        $dosen->save();
        return redirect()->route('dosenList')
            ->with('status', 'Dosen berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return readirect(route('dosenList'));
    }
}
