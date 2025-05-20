@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Dosen</h2>
    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ old('nip') }}" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jurusan_id" class="form-label">Jurusan</label>
            <select name="jurusan_id" class="form-select">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama_jurusan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp') }}">
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="isDosenWali" value="1" {{ old('isDosenWali') ? 'checked' : '' }}>
            <label class="form-check-label">Dosen Wali</label>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
