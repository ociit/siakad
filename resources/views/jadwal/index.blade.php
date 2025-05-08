@extends('layouts.app')

@section('content')
    <h1>Daftar Jadwal Kuliah</h1>
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="list-group">
        @foreach($jadwals as $jadwal)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('jadwal.show', $jadwal->id) }}">{{ $jadwal->nama_jadwal }}</a>
                <span class="badge bg-secondary">{{ $jadwal->jadwal_matakuliahs_count }} matakuliah</span>
            </li>
        @endforeach
    </ul>
@endsection
