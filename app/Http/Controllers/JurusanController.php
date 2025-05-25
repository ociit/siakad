<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Departemen;
use Illuminate\Http\Request;

class JurusanController extends Controller
{

    public function index($id)
    {
        $departemen = Departemen::with('jurusans')->findOrFail($id);
        return view('jurusan.index', compact('departemen'));
    }
    public function edit($id)
    {
        $jurusan = Jurusan::with('departemen')->findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function create($departemen_id)
    {
        $departemen = Departemen::findOrFail($departemen_id);
        return view('jurusan.create', compact('departemen'));
    }

    public function store(Request $request, $departemen_id)
    {
        $request->validate(['nama_jurusan' => 'required']);
        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'departemen_id' => $departemen_id
        ]);
        return redirect()->route('jurusan.index', $departemen_id);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama_jurusan' => 'required']);
        Jurusan::findOrFail($id)->update($request->only('nama_jurusan'));
        return redirect()->route('jurusan.index');
    }

    public function destroy($id)
    {
        Jurusan::findOrFail($id)->delete();
        return back();
    }
}
