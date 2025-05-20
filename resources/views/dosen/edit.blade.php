@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Dosen</h2>
    <form action="{{ route('dosen.update', $dosen->nip) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" class="form-control" value="{{ $dosen->nip }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $dosen->nama) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $dosen->email) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jurusan</label>
            <select name="jurusan_id" class="form-select">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ (old('jurusan_id', $dosen->jurusan_id) == $jurusan->id) ? 'selected' : '' }}>
                        {{ $jurusan->nama_jurusan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">No Telepon</label>
            <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp', $dosen->no_telp) }}">
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="isDosenWali" value="1" {{ old('isDosenWali', $dosen->isDosenWali) ? 'checked' : '' }}>
            <label class="form-check-label">Dosen Wali</label>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
