@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Mahasiswa</h1>

    <table class="table table-bordered">
        <tr><th>NRP</th><td>{{ $mahasiswa->nrp }}</td></tr>
        <tr><th>Nama</th><td>{{ $mahasiswa->nama }}</td></tr>
        <tr><th>Email</th><td>{{ $mahasiswa->email }}</td></tr>
        <tr><th>Kelas</th><td>{{ $mahasiswa->kelas->nama_kelas ?? '-' }}</td></tr>
        <tr><th>Semester</th><td>{{ $mahasiswa->semester }}</td></tr>
        <tr><th>No. Telepon</th><td>{{ $mahasiswa->no_telp ?? '-' }}</td></tr>
    </table>

    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
