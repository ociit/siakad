@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Dosen</h1>

    <form action="{{ route('dosen.update', $dosen->nip) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" class="form-control" value="{{ $dosen->nip }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $dosen->nama }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $dosen->email }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jurusan</label>
            <input type="number" name="jurusan_id" class="form-control" value="{{ $dosen->jurusan_id }}">
        </div>

        <div class="mb-3">
            <label class="form-label">No Telp</label>
            <input type="text" name="no_telp" class="form-control" value="{{ $dosen->no_telp }}">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="isDosenWali" value="1" class="form-check-input" id="isDosenWali"
                {{ $dosen->isDosenWali ? 'checked' : '' }}>
            <label class="form-check-label" for="isDosenWali">Dosen Wali</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
