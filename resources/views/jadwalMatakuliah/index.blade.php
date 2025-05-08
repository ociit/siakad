@extends('layouts.app')

@section('content')
    <h1>Jadwal Kuliah</h1>
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary">Tambah Jadwal</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Jadwal</th>
                <th>Total Mata Kuliah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->id }}</td>
                    <td>{{ $jadwal->nama_jadwal }}</td>
                    <td>{{ $jadwal->jadwalMatakuliahs_count }}</td>
                    <td>
                        <a href="{{ route('jadwal.show', $jadwal->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
