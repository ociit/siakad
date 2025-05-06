<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Validation\Rule;
use App\Models\Dosen;
use App\Models\JadwalKuliah;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with(['jurusan', 'dosen', 'jadwalKuliah'])->get();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        $dosens = Dosen::where('isDosenWali', true)->get(); // hanya dosen wali
        $jadwals = JadwalKuliah::all();
        return view('kelas.create', compact('jurusans', 'dosens', 'jadwals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'jurusan_id' => 'required|exists:jurusans,id',
            'dosen_nip' => [
                'required',
                Rule::exists('dosens', 'nip')->where('isDosenWali', true)
            ],
            'semester' => 'required|integer|min:1',
            'jadwal_kuliah_id' => 'required|exists:jadwal_kuliahs,id',
        ]);
    
        Kelas::create($request->all());
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        $kelas->load(['jurusan', 'dosen', 'jadwalKuliah', 'mahasiswas']);
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        $jurusans = Jurusan::all();
        $dosens = Dosen::where('isDosenWali', true)->get(); // hanya dosen wali
        $jadwals = JadwalKuliah::all();
        return view('kelas.edit', compact('kelas', 'jurusans', 'dosens', 'jadwals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'jurusan_id' => 'required|exists:jurusans,id',
            'dosen_nip' => 'required|exists:dosens,nip',
            'semester' => 'required|integer',
            'jadwal_kuliah_id' => 'required|exists:jadwal_kuliahs,id',
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
