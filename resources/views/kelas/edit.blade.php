@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kelas</h1>

    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('kelas.partials.form', [
            'kelas' => $kelas,
            'jurusans' => $jurusans,
            'dosens' => $dosens,
            'jadwals' => $jadwalKuliah // pastikan nama variabel ini sama
        ])

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
