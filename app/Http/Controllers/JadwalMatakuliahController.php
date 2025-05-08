<?php

namespace App\Http\Controllers;

use App\Models\JadwalKuliah;
use App\Models\JadwalMataKuliah;
use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class JadwalMataKuliahController extends Controller
{
    public function create(JadwalKuliah $jadwal)
    {
        $matakuliahs = Matakuliah::all();
        $dosens = Dosen::all();
        return view('jadwalMatakuliah.create', compact('jadwal', 'matakuliahs', 'dosens'));
    }

    public function store(Request $request, JadwalKuliah $jadwal)
    {
        $request->validate([
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'dosen_nip' => 'required|exists:dosens,nip',
            'dosen_pengajar2_nip' => 'nullable|exists:dosens,nip',
            'hari' => 'required|string|max:10',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'ruangan' => 'required|string|max:50',
            'semester' => 'required|integer',
        ]);

        JadwalMataKuliah::create([
            'jadwal_kuliah_id' => $jadwal->id,
            'matakuliah_id' => $request->matakuliah_id,
            'dosen_nip' => $request->dosen_nip,
            'dosen_pengajar2_nip' => $request->dosen_pengajar2_nip,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruangan' => $request->ruangan,
            'semester' => $request->semester,
        ]);

        return redirect()->route('jadwal.show', $jadwal->id)->with('success', 'Detail matakuliah berhasil ditambahkan.');
    }

    public function edit(JadwalKuliah $jadwal, JadwalMataKuliah $detail)
    {
        $matakuliahs = Matakuliah::all();
        $dosens = Dosen::all();
        return view('jadwalMatakuliah.edit', compact('jadwal', 'detail', 'matakuliahs', 'dosens'));
    }

    public function show($id)
{
    // Ambil jadwal matakuliah berdasarkan ID
    $jadwalMataKuliah = JadwalMataKuliah::findOrFail($id);
    
    // Ambil jadwal kuliah yang terkait dengan jadwal matakuliah
    $jadwalKuliah = $jadwalMataKuliah->jadwalKuliah;

    // Kirim data ke view
    return view('jadwalMatakuliah.show', compact('jadwalKuliah', 'jadwalMataKuliah'));
}



    public function update(Request $request, JadwalKuliah $jadwal, JadwalMataKuliah $detail)
    {
        $request->validate([
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'dosen_nip' => 'required|exists:dosens,nip',
            'dosen_pengajar2_nip' => 'nullable|exists:dosens,nip',
            'hari' => 'required|string|max:10',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'ruangan' => 'required|string|max:50',
            'semester' => 'required|integer',
        ]);

        $detail->update([
            'matakuliah_id' => $request->matakuliah_id,
            'dosen_nip' => $request->dosen_nip,
            'dosen_pengajar2_nip' => $request->dosen_pengajar2_nip,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruangan' => $request->ruangan,
            'semester' => $request->semester,
        ]);

        return redirect()->route('jadwal.show', $jadwal->id)->with('success', 'Detail matakuliah berhasil diperbarui.');
    }

    public function destroy(JadwalKuliah $jadwal, JadwalMataKuliah $detail)
    {
        $detail->delete();
        return redirect()->route('jadwal.show', $jadwal->id)->with('success', 'Detail matakuliah berhasil dihapus.');
    }
}
