@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jadwal Mata Kuliah</h1>
    <form action="{{ route('jadwal-matakuliah.update', [$jadwal_kuliah->id, $matakuliah->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="matakuliah_id">Mata Kuliah</label>
                <select id="matakuliah_id" name="matakuliah_id" class="form-control">
                    @foreach ($matakuliahs as $mk)
                        <option 
                            value="{{ $mk->id }}"
                            data-dosen="{{ $mk->dosen->nip }}"
                            data-semester="{{ $mk->semester }}"
                            {{ $mk->id == $matakuliah->matakuliah_id ? 'selected' : '' }}>
                            {{ $mk->nama_matakuliah }}
                        </option>
                    @endforeach
                </select>
        </div>

        <div class="form-group">
            <label for="dosen_nama">Dosen Utama</label>
            <input id="dosen_nama" class="form-control" readonly value="{{ $matakuliah->dosen->nama ?? '' }}">
            <input type="hidden" id="dosen_nip" name="dosen_nip" value="{{ $matakuliah->dosen_nip }}">
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
                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $hari)
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
            <input type="number" id="semester" name="semester" class="form-control" value="{{ $matakuliah->semester }}" readonly>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="{{ route('jadwal-kuliah.show', $jadwal_kuliah->id) }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const matakuliahSelect = document.getElementById('matakuliah_id');
    const dosenNipInput = document.getElementById('dosen_nip');
    const dosenNamaInput = document.getElementById('dosen_nama');
    const semesterInput = document.getElementById('semester');

    // Ambil data dosen dari server sebagai array JS
    const daftarDosen = @json($dosens);

    function updateDosenDanSemester() {
        const selected = matakuliahSelect.options[matakuliahSelect.selectedIndex];
        const dosenNip = selected.getAttribute('data-dosen');
        const semester = selected.getAttribute('data-semester');

        // Update hidden input NIP
        dosenNipInput.value = dosenNip ?? '';
        semesterInput.value = semester ?? '';

        // Cari nama dosen berdasarkan NIP
        const dosen = daftarDosen.find(d => d.nip === dosenNip);
        dosenNamaInput.value = dosen ? dosen.nama : '';
    }

    // Jalankan saat halaman pertama kali load
    updateDosenDanSemester();

    // Jalankan juga ketika ada perubahan select
    matakuliahSelect.addEventListener('change', updateDosenDanSemester);
});
</script>
@endpush