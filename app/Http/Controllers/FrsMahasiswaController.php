<?php

namespace App\Http\Controllers;

use App\Models\FrsMahasiswa;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class FrsMahasiswaController extends Controller
{
    public function index()
    {
        $frs = FrsMahasiswa::with(['mahasiswa', 'matakuliah'])->get();
        return view('frs.index', compact('frs'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
    
        return view('frs.create', [
            'mahasiswas' => $mahasiswas,
            'matakuliahs' => $matakuliahs,
            'frs_mahasiswa' => null,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_nrp' => 'required|exists:mahasiswas,nrp',
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'semester' => 'required|integer|min:1',
            'tanggal_pengajuan' => 'required|date',
        ]);

        FrsMahasiswa::create($request->all());

        return redirect()->route('frs-mahasiswa.index')->with('success', 'FRS berhasil ditambahkan.');
    }

    public function show(FrsMahasiswa $frs_mahasiswa)
    {
        return view('frs.show', compact('frs_mahasiswa'));
    }

    public function edit(FrsMahasiswa $frs_mahasiswa)
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = MataKuliah::all();
        return view('frs.edit', compact('frs_mahasiswa', 'mahasiswas', 'matakuliahs'));
    }

    public function update(Request $request, FrsMahasiswa $frs_mahasiswa)
    {
        $request->validate([
            'mahasiswa_nrp' => 'required|exists:mahasiswas,nrp',
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'semester' => 'required|integer|min:1',
            'status' => 'required|in:acc,belum acc',
            'tanggal_pengajuan' => 'required|date',
        ]);

        $frs_mahasiswa->update($request->all());

        return redirect()->route('frs-mahasiswa.index')->with('success', 'FRS berhasil diupdate.');
    }

    public function destroy(FrsMahasiswa $frs_mahasiswa)
    {
        $frs_mahasiswa->delete();
        return redirect()->route('frs-mahasiswa.index')->with('success', 'FRS berhasil dihapus.');
    }
}
