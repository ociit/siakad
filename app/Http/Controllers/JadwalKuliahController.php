<?php 
namespace App\Http\Controllers;

use App\Models\JadwalKuliah;
use Illuminate\Http\Request;

class JadwalKuliahController extends Controller
{
    public function index()
    {
        $jadwals = JadwalKuliah::all();
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

        return redirect()->route('jadwal-kuliah.index')->with('success', 'Jadwal kuliah berhasil dibuat.');
    }

    public function show(JadwalKuliah $jadwal_kuliah)
    {
        $jadwalMatakuliah = $jadwal_kuliah->jadwalMatakuliahs()->with(['mataKuliah', 'dosenUtama', 'dosenTambahan'])->get();
        return view('jadwal.show', compact('jadwal_kuliah', 'jadwalMatakuliah'));
    }

    public function edit(JadwalKuliah $jadwal_kuliah)
    {
        return view('jadwal.edit', compact('jadwal_kuliah'));
    }

    public function update(Request $request, JadwalKuliah $jadwal_kuliah)
    {
        $request->validate([
            'nama_jadwal' => 'required|string|max:255',
        ]);

        $jadwal_kuliah->update($request->all());

        return redirect()->route('jadwal-kuliah.index')->with('success', 'Jadwal kuliah berhasil diperbarui.');
    }

    public function destroy(JadwalKuliah $jadwal_kuliah)
    {
        $jadwal_kuliah->delete();
        return redirect()->route('jadwal-kuliah.index')->with('success', 'Jadwal kuliah berhasil dihapus.');
    }
}
