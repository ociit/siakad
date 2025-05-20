@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Jadwal Kuliah: {{ $jadwal_kuliah->nama_jadwal }}</h1>

    <a href="{{ route('jadwal-matakuliah.create', $jadwal_kuliah->id) }}" class="btn btn-primary mb-3">Tambah Jadwal Mata Kuliah</a>

    <table class="table">
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>Dosen Utama</th>
                <th>Dosen Tambahan</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Ruangan</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwalMatakuliah as $item)
            <tr>
                <td>{{ $item->mataKuliah->nama_matakuliah ?? '-' }}</td>
                <td>{{ $item->dosenUtama->nama ?? '-' }}</td>
                <td>{{ $item->dosenTambahan->nama ?? '-' }}</td>
                <td>{{ $item->hari}}</td>
                <td>{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                <td>{{ $item->ruangan }}</td>
                <td>{{ $item->semester }}</td>
                <td>
                    <a href="{{ route('jadwal-matakuliah.edit', [$jadwal_kuliah->id, $item->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('jadwal-matakuliah.destroy', [$jadwal_kuliah->id, $item->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        <a href="{{ route('jadwal-kuliah.index', $jadwal_kuliah->id) }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
