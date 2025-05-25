<?php

namespace App\Http\Controllers;

use App\Models\NilaiMahasiswa;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class NilaiMahasiswaController extends Controller
{
    public function index()
    {
        $nilai = NilaiMahasiswa::with(['mahasiswa', 'matakuliah', 'dosen'])->get();
        return view('nilai.index', compact('nilai'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $matakuliah = MataKuliah::all();
        $dosen = Dosen::all();
        return view('nilai.create', compact('mahasiswa', 'matakuliah', 'dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_nrp' => 'required',
            'matakuliah_id' => 'required',
            'dosen_nip' => 'required',
            'semester' => 'required|integer',
            'nilai_uts' => 'required|numeric',
            'nilai_uas' => 'required|numeric',
            'nilai_tugas' => 'required|numeric',
        ]);

        $nilai_akhir = ($request->nilai_uts + $request->nilai_uas + $request->nilai_tugas) / 3;
        $grade = $this->hitungGrade($nilai_akhir);

        NilaiMahasiswa::create([
            ...$request->only(['mahasiswa_nrp', 'matakuliah_id', 'dosen_nip', 'semester', 'nilai_uts', 'nilai_uas', 'nilai_tugas']),
            'nilai_akhir' => $nilai_akhir,
            'grade' => $grade,
        ]);

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $nilai = NilaiMahasiswa::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $matakuliah = MataKuliah::all();
        $dosen = Dosen::all();
        return view('nilai.edit', compact('nilai', 'mahasiswa', 'matakuliah', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mahasiswa_nrp' => 'required',
            'matakuliah_id' => 'required',
            'dosen_nip' => 'required',
            'semester' => 'required|integer',
            'nilai_uts' => 'required|numeric',
            'nilai_uas' => 'required|numeric',
            'nilai_tugas' => 'required|numeric',
        ]);

        $nilai = NilaiMahasiswa::findOrFail($id);
        $nilai_akhir = ($request->nilai_uts + $request->nilai_uas + $request->nilai_tugas) / 3;
        $grade = $this->hitungGrade($nilai_akhir);

        $nilai->update([
            ...$request->only(['mahasiswa_nrp', 'matakuliah_id', 'dosen_nip', 'semester', 'nilai_uts', 'nilai_uas', 'nilai_tugas']),
            'nilai_akhir' => $nilai_akhir,
            'grade' => $grade,
        ]);

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diperbarui');
    }

    public function destroy($id)
    {
        NilaiMahasiswa::findOrFail($id)->delete();
        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus');
    }

    private function hitungGrade($nilai_akhir)
    {
        return match(true) {
            $nilai_akhir >= 85 => 'A',
            $nilai_akhir >= 75 => 'B',
            $nilai_akhir >= 65 => 'C',
            $nilai_akhir >= 50 => 'D',
            default => 'E',
        };
    }
}
