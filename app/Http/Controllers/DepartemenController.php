<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{

    public function index()
    {
        $departemens = Departemen::all();
        return view('departemen.index', compact('departemens'));
    }

    public function create()
    {
        return view('departemen.create');
    }

    public function edit($id)
    {
        $departemen = Departemen::findOrFail($id);
        return view('departemen.edit', compact('departemen'));
    }

    public function store(Request $request)
    {
        $request->validate(['nama_departemen' => 'required']);
        Departemen::create($request->only('nama_departemen'));
        return redirect()->route('departemen.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama_departemen' => 'required']);
        Departemen::findOrFail($id)->update($request->only('nama_departemen'));
        return redirect()->route('departemen.index');
    }

    public function destroy($id)
    {
        $departemen = Departemen::findOrFail($id);
        $departemen->jurusans()->delete();
        $departemen->delete();
        return redirect()->route('departemen.index');
    }
}
