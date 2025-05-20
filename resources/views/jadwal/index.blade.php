@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Jadwal Kuliah</h1>
    <a href="{{ route('jadwal-kuliah.create') }}" class="btn btn-primary mb-3">Tambah Jadwal Kuliah</a>

    @foreach ($jadwals as $jadwal)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $jadwal->nama_jadwal }}</h5>
                <a href="{{ route('jadwal-kuliah.show', $jadwal->id) }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="{{ route('jadwal-kuliah.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('jadwal-kuliah.destroy', $jadwal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection