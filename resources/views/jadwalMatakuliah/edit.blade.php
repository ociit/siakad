@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jadwal Mata Kuliah</h1>
    <form action="{{ route('jadwal-matakuliah.update', [$jadwal_kuliah->id, $matakuliah->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="matakuliah_id">Mata Kuliah</label>
            <select name="matakuliah_id" class="form-control">
                @foreach ($matakuliahs as $mk)
                    <option value="{{ $mk->id }}" {{ $mk->id == $matakuliah->matakuliah_id ? 'selected' : '' }}>
                        {{ $mk->nama_matakuliah }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="dosen_nip">Dosen Utama</label>
            <select name="dosen_nip" class="form-control">
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->nip }}" {{ $dosen->nip == $matakuliah->dosen_nip ? 'selected' : '' }}>
                        {{ $dosen->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="dosen_pengajar2_nip">Dosen Tambahan (opsional)</label>
            <select name="dosen_pengajar2_nip" class="form-control">
                <option value="">-- Tidak ada --</option>
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->nip }}" {{ $dosen->nip == $matakuliah->dosen_pengajar2_nip ? 'selected' : '' }}>
                        {{ $dosen->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="hari">Hari</label>
            <select name="hari" class="form-control">
                @php
                    $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                @endphp
                @foreach ($hariList as $hari)
                    <option value="{{ $hari }}" {{ $matakuliah->hari == $hari ? 'selected' : '' }}>
                        {{ $hari }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jam_mulai">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" value="{{ $matakuliah->jam_mulai }}">
        </div>

        <div class="form-group">
            <label for="jam_selesai">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" value="{{ $matakuliah->jam_selesai }}">
        </div>

        <div class="form-group">
            <label for="ruangan">Ruangan</label>
            <input type="text" name="ruangan" class="form-control" value="{{ $matakuliah->ruangan }}">
        </div>

        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" name="semester" class="form-control" value="{{ $matakuliah->semester }}">
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="{{ route('jadwal-kuliah.show', $jadwal_kuliah->id) }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
