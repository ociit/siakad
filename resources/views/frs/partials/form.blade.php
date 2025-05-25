@csrf

<div class="form-group mb-3">
    <label for="mahasiswa_nrp">Mahasiswa</label>
    <select name="mahasiswa_nrp" id="mahasiswa_nrp" class="form-control">
        <option value="">-- Pilih Mahasiswa --</option>
        @foreach ($mahasiswas as $m)
            <option value="{{ $m->nrp }}" data-semester="{{ $m->semester }}"
                    {{ (old('mahasiswa_nrp', $frs_mahasiswa->mahasiswa_nrp ?? '') == $m->nrp) ? 'selected' : '' }}>
                {{ $m->nama }} ({{ $m->nrp }})
            </option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label for="matakuliah_id">Mata Kuliah</label>
    <select name="matakuliah_id" id="matakuliah_id" class="form-control">
        <option value="">-- Pilih Mata Kuliah --</option>
        @foreach ($matakuliahs as $mk)
            <option value="{{ $mk->id }}" {{ (old('matakuliah_id', $frs_mahasiswa->matakuliah_id ?? '') == $mk->id) ? 'selected' : '' }}>
                {{ $mk->nama_matakuliah }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label for="semester">Semester</label>
    <input type="number" name="semester" id="semester" class="form-control" readonly
    value="{{ old('semester', $frs_mahasiswa->semester ?? '') }}">
</div>

@if (isset($frs_mahasiswa))
    <div class="form-group mb-3">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="belum acc" {{ old('status', $frs_mahasiswa->status) == 'belum acc' ? 'selected' : '' }}>Belum ACC</option>
            <option value="acc" {{ old('status', $frs_mahasiswa->status) == 'acc' ? 'selected' : '' }}>ACC</option>
        </select>
    </div>
@endif

<div class="form-group mb-3">
    <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
    <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control"
    value="{{ old('tanggal_pengajuan', isset($frs_mahasiswa) ? \Carbon\Carbon::parse($frs_mahasiswa->tanggal_pengajuan)->format('Y-m-d') : '') }}">
</div>

<button type="submit" class="btn btn-success">{{ $submitButton ?? 'Simpan' }}</button>
<a href="{{ route('frs-mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
