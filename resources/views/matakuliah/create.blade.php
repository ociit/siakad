@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Mata Kuliah</h2>
        <form action="{{ route('matakuliah.store') }}" method="POST">
            @csrf
            @include('matakuliah.partials.form', ['matakuliah' => new \App\Models\MataKuliah()])
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
