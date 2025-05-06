<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    // GET /api/dosen
    public function index()
    {
        $dosen = Dosen::all(); // Ambil semua data dosen
    return view('dosen.index', compact('dosen'));
    }

    public function create()
{
    return view('dosen.create'); // Pastikan view ini ada
}


    // POST /api/dosen
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:dosens,nip',
            'nama' => 'required',
            'email' => 'required|email|unique:dosens,email',
            'password' => 'required|min:6',
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'no_telp' => 'nullable',
            'isDosenWali' => 'nullable|boolean'
        ]);

        $dosen = Dosen::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jurusan_id' => $request->jurusan_id,
            'no_telp' => $request->no_telp,
            'isDosenWali' => $request->isDosenWali ?? false
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan');
    }

    // GET /api/dosen/{nip}
    public function show($nip)
    {
        $dosen = Dosen::findOrFail($nip);
        return view('dosen.show', compact('dosen'));
    }

    // PUT /api/dosen/{nip}
    public function update(Request $request, $nip)
    {
        $dosen = Dosen::findOrFail($nip);

        $request->validate([
            'nama' => 'required',
            'email' => "required|email|unique:dosens,email,$nip,nip",
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'no_telp' => 'nullable',
            'isDosenWali' => 'nullable|boolean'
        ]);

        $dosen->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan_id' => $request->jurusan_id,
            'no_telp' => $request->no_telp,
            'isDosenWali' => $request->isDosenWali ?? false
        ]);

        return redirect()->route('dosen.index')->with('success', 'Data dosen diperbarui');
    }

    // DELETE /api/dosen/{nip}
    public function destroy($nip)
{
    $dosen = Dosen::findOrFail($nip);
    $dosen->delete();

    return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus');
}

    public function edit($nip)
{
    $dosen = Dosen::findOrFail($nip);
    return view('dosen.edit', compact('dosen'));
}

}
