@extends('layouts.app')

@section('content')
    <h3>Tambah Kelas</h3>
    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <select name="jurusan_id" class="form-control" required>
                @foreach ($jurusans as $j)
                    <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>

                <div class="mb-3">
            <label for="dosen_nip" class="form-label">Dosen Pengampu</label>
            <select name="dosen_nip" id="dosen_nip" class="form-select" required>
                <option value="">-- Pilih Dosen Pengampu (Dosen Wali Saja) --</option>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->nip }}" {{ old('dosen_nip', $kelas->dosen_nip ?? '') == $dosen->nip ? 'selected' : '' }}>
                        {{ $dosen->nama }} ({{ $dosen->nip }})
                    </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label>Semester</label>
            <input type="number" name="semester" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jadwal Kuliah</label>
            <select name="jadwal_kuliah_id" class="form-control" required>
                @foreach ($jadwals as $j)
                    <option value="{{ $j->id }}">{{ $j->hari }} - {{ $j->jam_mulai }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
