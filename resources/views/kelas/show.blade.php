@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kelas</h1>

    <ul>
        <li>Nama Kelas: {{ $kelas->nama_kelas }}</li>
        <li>Jurusan: {{ $kelas->jurusan->nama_jurusan ?? '-' }}</li>
        <li>Dosen Wali: {{ $kelas->dosen->nama ?? '-' }}</li>
        <li>Semester: {{ $kelas->semester }}</li>
        <li>Jadwal Kuliah: {{ $kelas->jadwalKuliah->hari ?? '-' }}</li>
    </ul>

    <h4>Daftar Mahasiswa</h4>
    @if($kelas->mahasiswas->isEmpty())
        <p>Tidak ada mahasiswa di kelas ini.</p>
    @else
        <ul>
            @foreach($kelas->mahasiswas as $mhs)
                <li>{{ $mhs->nama }} ({{ $mhs->nrp }})</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
