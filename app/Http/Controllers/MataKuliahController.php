<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Jurusan;


class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosens = Dosen::all();
        $jurusans = Jurusan::all();
        return view('matakuliah.create', compact('dosens', 'jurusans'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_matakuliah' => 'required',
            'dosen_nip' => 'required|exists:dosens,nip',
            'jurusan_id' => 'required|exists:jurusans,id',
            'sks' => 'required|numeric',
            'semester' => 'required|numeric',
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $matakuliah)
    {
        $dosens = Dosen::all();
        $jurusans = Jurusan::all();
        return view('matakuliah.edit', compact('matakuliah', 'dosens', 'jurusans'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataKuliah $matakuliah)
    {
        $request->validate([
            'nama_matakuliah' => 'required',
            'dosen_nip' => 'required|exists:dosens,nip',
            'jurusan_id' => 'required|exists:jurusans,id',
            'sks' => 'required|numeric',
            'semester' => 'required|numeric',
        ]);

        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $mataKuliah)
    {
        //
    }
}
