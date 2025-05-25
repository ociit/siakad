<div class="mb-3">
    <label>Mahasiswa</label>
    <select name="mahasiswa_nrp" class="form-control" required>
        @foreach($mahasiswa as $mhs)
            <option value="{{ $mhs->nrp }}" {{ (old('mahasiswa_nrp', $nilai->mahasiswa_nrp ?? '') == $mhs->nrp) ? 'selected' : '' }}>
                {{ $mhs->nama }} ({{ $mhs->nrp }})
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Mata Kuliah</label>
    <select name="matakuliah_id" class="form-control" id="matakuliah" required>
        @foreach($matakuliah as $mk)
            <option 
                value="{{ $mk->id }}" 
                data-dosen="{{ $mk->dosen_nip }}" 
                data-dosen-nama="{{ $mk->dosen->nama ?? '' }}" 
                data-semester="{{ $mk->semester }}"
                {{ (old('matakuliah_id', $nilai->matakuliah_id ?? '') == $mk->id) ? 'selected' : '' }}>
                {{ $mk->nama_matakuliah }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label for="dosen_nama">Dosen Utama</label>
    <input id="dosen_nama" class="form-control" readonly value="{{ old('dosen_nama', $nilai->dosen->nama ?? '') }}">
<input type="hidden" id="dosen_nip" name="dosen_nip" value="{{ old('dosen_nip', $nilai->dosen_nip ?? '') }}"></div>

<div class="form-group mb-3">
    <label for="semester_tampil">Semester</label>
    <input id="semester_tampil" class="form-control" readonly value="{{ old('semester', $nilai->semester ?? '') }}">
<input type="hidden" id="semester" name="semester" value="{{ old('semester', $nilai->semester ?? '') }}"></div>

<div class="mb-3">
    <label>Nilai UTS</label>
    <input type="number" step="0.01" name="nilai_uts" class="form-control" value="{{ old('nilai_uts', $nilai->nilai_uts ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Nilai UAS</label>
    <input type="number" step="0.01" name="nilai_uas" class="form-control" value="{{ old('nilai_uas', $nilai->nilai_uas ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Nilai Tugas</label>
    <input type="number" step="0.01" name="nilai_tugas" class="form-control" value="{{ old('nilai_tugas', $nilai->nilai_tugas ?? '') }}" required>
</div>

<script>
    document.getElementById('matakuliah').addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];

        // Ambil data dari atribut option
        const dosenNip = selected.getAttribute('data-dosen');
        const dosenNama = selected.getAttribute('data-dosen-nama');
        const semester = selected.getAttribute('data-semester');

        // Isi ke input readonly dan hidden
        document.getElementById('dosen_nama').value = dosenNama || '';
        document.getElementById('dosen_nip').value = dosenNip || '';
        document.getElementById('semester_tampil').value = semester || '';
        document.getElementById('semester').value = semester || '';
    });
</script>