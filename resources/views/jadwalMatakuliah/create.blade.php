@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jadwal Mata Kuliah untuk: {{ $jadwal_kuliah->nama_jadwal }}</h1>
    <form action="{{ route('jadwal-matakuliah.store', $jadwal_kuliah->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Mata Kuliah</label>
            <select id="matakuliah_id" name="matakuliah_id" class="form-control">
                <option value="">-- Pilih Matakuliah--</option>
                @foreach ($matakuliahs as $mk)
                    <option 
                        value="{{ $mk->id }}" 
                        data-dosen="{{ $mk->dosen->nip }}" 
                        data-semester="{{ $mk->semester }}">
                        {{ $mk->nama_matakuliah }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Nama Dosen Utama</label>
            <input type="hidden" id="dosen_nip" name="dosen_nip">
            <input type="text" id="dosen_nama" class="form-control" readonly>
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
            <select name="hari" class="form-control">
                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $hari)
                    <option value="{{ $hari }}">{{ $hari }}</option>
                @endforeach
            </select>
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
            <input type="number" id="semester" name="semester" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('jadwal-kuliah.show', $jadwal_kuliah->id) }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const matakuliahSelect = document.getElementById('matakuliah_id');
        const dosenNipInput = document.getElementById('dosen_nip');
        const semesterInput = document.getElementById('semester');
        const dosenNamaInput = document.getElementById('dosen_nama'); // jika ditambahkan

        // Ambil data dosens dari backend agar bisa digunakan untuk mapping nama
        const dosens = @json($dosens);

        matakuliahSelect.addEventListener('change', function () {
            const selected = matakuliahSelect.options[matakuliahSelect.selectedIndex];
            const dosenNip = selected.getAttribute('data-dosen');
            const semester = selected.getAttribute('data-semester');

            dosenNipInput.value = dosenNip || '';
            semesterInput.value = semester || '';

            // Set nama dosen jika ada field nama dosen
            if (dosenNamaInput) {
                const dosen = dosens.find(d => d.nip === dosenNip);
                dosenNamaInput.value = dosen ? dosen.nama : '';
            }
        });
    });
</script>
@endpush