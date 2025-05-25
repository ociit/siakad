@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail FRS Mahasiswa</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>NRP:</strong> {{ $frs_mahasiswa->mahasiswa_nrp }}</li>
        <li class="list-group-item"><strong>Nama:</strong> {{ $frs_mahasiswa->mahasiswa->nama }}</li>
        <li class="list-group-item"><strong>Mata Kuliah:</strong> {{ $frs_mahasiswa->matakuliah->nama_matakuliah }}</li>
        <li class="list-group-item"><strong>Semester:</strong> {{ $frs_mahasiswa->semester }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $frs_mahasiswa->status }}</li>
        <li class="list-group-item"><strong>Tanggal Pengajuan:</strong> {{ $frs_mahasiswa->tanggal_pengajuan }}</li>
    </ul>
</div>
@endsection
