<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Console\Events\CommandStarting;
use Illuminate\Http\Request;
use ReturnTypeWillChange;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('kelas')->get();
        return view('mahasiswa.index', compact ('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswa.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nrp' => 'required|unique:mahasiswas,nrp',
            'nama' => 'required',
            'email' => 'required|email|unique:mahasiswas,email',
            'password' => 'required|min:6',
            'kelas_id' => 'required',
            'semester' => 'required|integer',
            'no_telp' => 'nullable',
        ]);

        Mahasiswa::created([
            'nrp' => $request->nrp,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'kelas_id' => $request->kelas_id,
            'semester' => $request->semester,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $kelas = Kelas::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->nrp . ',nrp',
            'kelas_id' => 'required',
            'semester' => 'required|integer',
            'no_telp' => 'nullable',
        ]);

        $mahasiswa->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'kelas_id' => $request->kelas_id,
            'semester' => $request->semester,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa telah berhasil dihapus!');
    }
}
