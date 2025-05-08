@extends('layouts.app')

@section('content')
    <h1>Detail Jadwal Kuliah: {{ $jadwalKuliah->nama_jadwal }}</h1>

    <!-- Detail Jadwal Mata Kuliah -->
    <table class="table">
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>Dosen Utama</th>
                <th>Dosen Tambahan</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Ruangan</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwalKuliah->jadwalMatakuliahs as $jadwalMataKuliah)
                <tr>
                    <td>{{ $jadwalMataKuliah->mataKuliah->nama_matakuliah ?? '-' }}</td>
                    <td>{{ $jadwalMataKuliah->dosenUtama->nama ?? '-' }}</td>
                    <td>{{ $jadwalMataKuliah->dosenTambahan->nama ?? '-' }}</td>
                    <td>{{ $jadwalMataKuliah->hari ?? '-' }}</td>
                    <td>{{ $jadwalMataKuliah->jam_mulai ?? '-' }} - {{ $jadwalMataKuliah->jam_selesai ?? '-' }}</td>
                    <td>{{ $jadwalMataKuliah->ruangan ?? '-' }}</td>
                    <td>{{ $jadwalMataKuliah->semester ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('jadwal_matakuliah.create', $jadwalKuliah->id) }}" class="btn btn-primary mb-3">Tambah Jadwal</a>
@endsection
