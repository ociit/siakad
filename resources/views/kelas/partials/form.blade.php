<div class="mb-3">
    <label>Nama Kelas</label>
    <input type="text" name="nama_kelas" class="form-control" value="{{ old('nama_kelas', $kelas->nama_kelas ?? '') }}">
</div>

<div class="mb-3">
    <label>Jurusan</label>
    <select name="jurusan_id" class="form-control">
        <option value="">-- Pilih Jurusan --</option>
        @foreach($jurusans as $jurusan)
            <option value="{{ $jurusan->id }}" {{ old('jurusan_id', $kelas->jurusan_id ?? '') == $jurusan->id ? 'selected' : '' }}>
                {{ $jurusan->nama_jurusan }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Dosen Wali</label>
    <select name="dosen_nip" class="form-control">
        <option value="">-- Pilih Dosen --</option>
        @foreach($dosens as $dosen)
            <option value="{{ $dosen->nip }}" {{ old('dosen_nip', $kelas->dosen_nip ?? '') == $dosen->nip ? 'selected' : '' }}>
                {{ $dosen->nama }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Semester</label>
    <input type="number" name="semester" class="form-control" value="{{ old('semester', $kelas->semester ?? '') }}">
</div>

<div class="mb-3">
    <label>Jadwal Kuliah</label>
    <select name="jadwal_kuliah_id" class="form-control">
        <option value="">-- Pilih Jadwal --</option>
        @foreach($jadwals as $jadwal)
            <option value="{{ $jadwal->id }}" {{ old('jadwal_kuliah_id', $kelas->jadwal_kuliah_id ?? '') == $jadwal->id ? 'selected' : '' }}>
                {{ $jadwal->nama_jadwal }}
            </option>
        @endforeach
    </select>
</div>
