@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Daftar Kelas</h3>
        <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Kelas</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Jurusan</th>
                <th>Dosen</th>
                <th>Semester</th>
                <th>Jadwal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $k)
                <tr>
                    <td>{{ $k->nama_kelas }}</td>
                    <td>{{ $k->jurusan->nama_jurusan }}</td>
                    <td>{{ $k->dosen->nama }}</td>
                    <td>{{ $k->semester }}</td>
                    <td>{{ $k->jadwalKuliah->hari ?? '-' }} {{ $k->jadwalKuliah->jam_mulai ?? '' }}</td>
                    <td>
                        <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
