@csrf
<div class="mb-3">
    <label for="matakuliah_id" class="form-label">Matakuliah</label>
    <select name="matakuliah_id" id="matakuliah_id" class="form-control" required>
        @foreach($matakuliahs as $mk)
            <option value="{{ $mk->id }}" @selected(old('matakuliah_id', $detail->matakuliah_id ?? '') == $mk->id)>
                {{ $mk->nama }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="dosen_nip" class="form-label">Dosen Utama</label>
    <select name="dosen_nip" id="dosen_nip" class="form-control" required>
        @foreach($dosens as $dosen)
            <option value="{{ $dosen->nip }}" @selected(old('dosen_nip', $detail->dosen_nip ?? '') == $dosen->nip)>
                {{ $dosen->nama }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="dosen_pengajar2_nip" class="form-label">Dosen Tambahan (opsional)</label>
    <select name="dosen_pengajar2_nip" id="dosen_pengajar2_nip" class="form-control">
        <option value="">-- Tidak Ada --</option>
        @foreach($dosens as $dosen)
            <option value="{{ $dosen->nip }}" @selected(old('dosen_pengajar2_nip', $detail->dosen_pengajar2_nip ?? '') == $dosen->nip)>
                {{ $dosen->nama }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="hari" class="form-label">Hari</label>
    <input type="text" name="hari" class="form-control" value="{{ old('hari', $detail->hari ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="jam_mulai" class="form-label">Jam Mulai</label>
    <input type="time" name="jam_mulai" class="form-control" value="{{ old('jam_mulai', $detail->jam_mulai ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="jam_selesai" class="form-label">Jam Selesai</label>
    <input type="time" name="jam_selesai" class="form-control" value="{{ old('jam_selesai', $detail->jam_selesai ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="ruangan" class="form-label">Ruangan</label>
    <input type="text" name="ruangan" class="form-control" value="{{ old('ruangan', $detail->ruangan ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="semester" class="form-label">Semester</label>
    <input type="number" name="semester" class="form-control" value="{{ old('semester', $detail->semester ?? '') }}" required>
</div>
