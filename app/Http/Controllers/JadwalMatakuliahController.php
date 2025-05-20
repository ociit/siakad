<?php 
namespace App\Http\Controllers;

use App\Models\JadwalKuliah;
use App\Models\JadwalMataKuliah;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class JadwalMataKuliahController extends Controller
{
    public function create(JadwalKuliah $jadwal_kuliah)
    {
        $dosens = Dosen::all();
        $matakuliahs = Matakuliah::all();
        return view('jadwalmatakuliah.create', compact('jadwal_kuliah', 'dosens', 'matakuliahs'));
    }

    public function store(Request $request, JadwalKuliah $jadwal_kuliah)
    {
        $request->validate([
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'dosen_nip' => 'required|exists:dosens,nip',
            'dosen_pengajar2_nip' => 'nullable|exists:dosens,nip',
            'hari' => 'required|string|max:10',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruangan' => 'required|string|max:50',
            'semester' => 'required|integer'
        ]);

        $jadwal_kuliah->jadwalMatakuliahs()->create($request->all());

        return redirect()->route('jadwal-kuliah.show', $jadwal_kuliah->id)->with('success', 'Jadwal mata kuliah ditambahkan.');
    }

    public function edit(JadwalKuliah $jadwal_kuliah, JadwalMataKuliah $matakuliah)
    {
        $dosens = Dosen::all();
        $matakuliahs = Matakuliah::all();
        return view('jadwalmatakuliah.edit', compact('jadwal_kuliah', 'matakuliah', 'dosens', 'matakuliahs'));
    }

    public function update(Request $request, JadwalKuliah $jadwal_kuliah, JadwalMataKuliah $matakuliah)
    {
        $request->validate([
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'dosen_nip' => 'required|exists:dosens,nip',
            'dosen_pengajar2_nip' => 'nullable|exists:dosens,nip',
            'hari' => 'required|string|max:10',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruangan' => 'required|string|max:50',
            'semester' => 'required|integer'
        ]);

        $matakuliah->update($request->all());

        return redirect()->route('jadwal-kuliah.show', $jadwal_kuliah->id)->with('success', 'Jadwal mata kuliah diperbarui.');
    }

    public function destroy(JadwalKuliah $jadwal_kuliah, JadwalMataKuliah $matakuliah)
    {
        $matakuliah->delete();
        return redirect()->route('jadwal-kuliah.show', $jadwal_kuliah->id)->with('success', 'Jadwal mata kuliah dihapus.');
    }
}
