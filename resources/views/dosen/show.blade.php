@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Dosen</h1>

    <table class="table table-bordered">
        <tr>
            <th>NIP</th>
            <td>{{ $dosen->nip }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $dosen->nama }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $dosen->email }}</td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td>{{ $dosen->jurusan->nama_jurusan ?? '-' }}</td>
        </tr>
        <tr>
            <th>No Telp</th>
            <td>{{ $dosen->no_telp ?? '-' }}</td>
        </tr>
        <tr>
            <th>Dosen Wali</th>
            <td>{{ $dosen->isDosenWali ? 'Ya' : 'Tidak' }}</td>
        </tr>
    </table>

    <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
