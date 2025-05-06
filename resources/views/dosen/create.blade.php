@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Dosen</h1>

    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" name="nip" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="mb-3">
            <label for="jurusan_id" class="form-label">Jurusan ID</label>
            <input type="number" class="form-control" name="jurusan_id">
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telp</label>
            <input type="text" class="form-control" name="no_telp">
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="isDosenWali" value="1" id="isDosenWali">
            <label class="form-check-label" for="isDosenWali">
                Dosen Wali
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
