@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jadwal Kuliah</h1>
    <form action="{{ route('jadwal-kuliah.update', $jadwal_kuliah->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama Jadwal</label>
            <input type="text" name="nama_jadwal" class="form-control" value="{{ $jadwal_kuliah->nama_jadwal }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>
</div>
@endsection
