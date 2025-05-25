@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jadwal Kuliah</h1>
    <form action="{{ route('jadwal-kuliah.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Jadwal</label>
            <input type="text" name="nama_jadwal" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('jadwal-kuliah.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
