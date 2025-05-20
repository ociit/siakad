@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jadwal Mata Kuliah untuk: {{ $jadwal_kuliah->nama_jadwal }}</h1>
    <form action="{{ route('jadwal-matakuliah.store', $jadwal_kuliah->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Mata Kuliah</label>
            <select name="matakuliah_id" class="form-control">
                @foreach ($matakuliahs as $mk)
                    <option value="{{ $mk->id }}">{{ $mk->nama_matakuliah }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Dosen Utama</label>
            <select name="dosen_nip" class="form-control">
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->nip }}">{{ $dosen->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Dosen Tambahan (opsional)</label>
            <select name="dosen_pengajar2_nip" class="form-control">
                <option value="">-- Tidak ada --</option>
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->nip }}">{{ $dosen->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control">
        </div>

        <div class="form-group">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control">
        </div>

        <div class="form-group">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control">
        </div>

        <div class="form-group">
            <label>Ruangan</label>
            <input type="text" name="ruangan" class="form-control">
        </div>

        <div class="form-group">
            <label>Semester</label>
            <input type="number" name="semester" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('jadwal-kuliah.show', $jadwal_kuliah->id) }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
