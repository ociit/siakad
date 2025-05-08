@extends('layouts.app')

@section('content')
    <h1>Tambah Jadwal Mata Kuliah untuk {{ $jadwal->nama_jadwal }}</h1>

    <form action="{{ route('jadwal_matakuliah.store', $jadwal->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="matakuliah_id">Mata Kuliah</label>
            <select name="matakuliah_id" id="matakuliah_id" class="form-control" required>
                @foreach ($matakuliahs as $matakuliah)
                    <option value="{{ $matakuliah->id }}">{{ $matakuliah->nama_matakuliah }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="dosen_nip">Dosen Utama</label>
            <select name="dosen_nip" id="dosen_nip" class="form-control" required>
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->nip }}">{{ $dosen->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="hari">Hari</label>
            <input type="text" name="hari" id="hari" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jam_mulai">Jam Mulai</label>
            <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jam_selesai">Jam Selesai</label>
            <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="ruangan">Ruangan</label>
            <input type="text" name="ruangan" id="ruangan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" name="semester" id="semester" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
@endsection
