@extends('layouts.app')

@section('content')
    <h3>Detail Kelas</h3>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $kelas->nama_kelas }}</h5>
            <p class="card-text"><strong>Jurusan:</strong> {{ $kelas->jurusan->nama_jurusan }}</p>
            <p class="card-text"><strong>Dosen Pengampu:</strong> {{ $kelas->dosen->nama }} ({{ $kelas->dosen->nip }})</p>
            <p class="card-text"><strong>Semester:</strong> {{ $kelas->semester }}</p>
            <p class="card-text"><strong>Jadwal Kuliah:</strong> 
                {{ $kelas->jadwalKuliah->hari ?? '-' }} - 
                {{ $kelas->jadwalKuliah->jam_mulai ?? '-' }}
            </p>
        </div>
    </div>

    <a href="{{ route('kelas.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Kelas</a>
@endsection
