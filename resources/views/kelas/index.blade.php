@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kelas</h1>
    <a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">Tambah Kelas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Jurusan</th>
                <th>Dosen Wali</th>
                <th>Semester</th>
                <th>Jadwal Kuliah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $k)
            <tr>
                <td>{{ $k->nama_kelas }}</td>
                <td>{{ $k->jurusan->nama_jurusan ?? '-' }}</td>
                <td>{{ $k->dosen->nama ?? '-' }}</td>
                <td>{{ $k->semester }}</td>
                <td>{{ $k->jadwalKuliah->nama_jadwal ?? '-' }}</td>
                <td>
                    <a href="{{ route('kelas.show', $k->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
