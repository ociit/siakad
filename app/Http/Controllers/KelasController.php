<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Dosen;
use App\Models\JadwalKuliah;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with(['jurusan', 'dosen', 'jadwalKuliah'])->get();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        $dosens = Dosen::where('isDosenWali', true)->get();
        $jadwals = JadwalKuliah::all();
        return view('kelas.create', compact('jurusans', 'dosens', 'jadwals'));
    }

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

    public function show(Kelas $kelas)
    {
        $kelas->load(['jurusan', 'dosen', 'jadwalKuliah', 'mahasiswas']);
        return view('kelas.show', compact('kelas'));
    }

    public function edit(Kelas $kelas)
    {
        $jurusans = Jurusan::all();
        $dosens = Dosen::all();
        $jadwalKuliah = JadwalKuliah::all();

        return view('kelas.edit', compact('kelas', 'jurusans', 'dosens', 'jadwalKuliah'));
    }

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

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
