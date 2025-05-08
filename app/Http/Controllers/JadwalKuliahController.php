<?php

namespace App\Http\Controllers;

use App\Models\JadwalKuliah;
use App\Models\JadwalMataKuliah;
use Illuminate\Http\Request;

class JadwalKuliahController extends Controller
{
    public function index()
    {
        $jadwals = JadwalKuliah::withCount('jadwalMatakuliahs')->get();
        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        return view('jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jadwal' => 'required|string|max:255',
        ]);

        JadwalKuliah::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function show($id)
    {
        $jadwalKuliah = JadwalKuliah::with('jadwalMatakuliahs.mataKuliah', 'jadwalMatakuliahs.dosenUtama', 'jadwalMatakuliahs.dosenTambahan')
            ->findOrFail($id);
        return view('jadwal.show', compact('jadwalKuliah'));
    }

    public function edit(JadwalKuliah $jadwal)
    {
        return view('jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, JadwalKuliah $jadwal)
    {
        $request->validate([
            'nama_jadwal' => 'required|string|max:255',
        ]);

        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy(JadwalKuliah $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
