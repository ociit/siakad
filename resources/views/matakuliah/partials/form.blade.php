<div class="mb-3">
    <label>Nama Mata Kuliah</label>
    <input type="text" name="nama_matakuliah" class="form-control" value="{{ old('nama_matakuliah', $matakuliah->nama_matakuliah) }}">
</div>

<div class="mb-3">
    <label>Dosen Pengampu</label>
    <select name="dosen_nip" class="form-control">
        <option value="">-- Pilih Dosen --</option>
        @foreach($dosens as $dosen)
            <option value="{{ $dosen->nip }}" {{ old('dosen_nip', $matakuliah->dosen_nip) == $dosen->nip ? 'selected' : '' }}>
                {{ $dosen->nama }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Jurusan</label>
    <select name="jurusan_id" class="form-control">
        <option value="">-- Pilih Jurusan --</option>
        @foreach($jurusans as $jurusan)
            <option value="{{ $jurusan->id }}" {{ old('jurusan_id', $matakuliah->jurusan_id) == $jurusan->id ? 'selected' : '' }}>
                {{ $jurusan->nama_jurusan }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>SKS</label>
    <input type="number" name="sks" class="form-control" value="{{ old('sks', $matakuliah->sks) }}">
</div>

<div class="mb-3">
    <label>Semester</label>
    <input type="number" name="semester" class="form-control" value="{{ old('semester', $matakuliah->semester) }}">
</div>
