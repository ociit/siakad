@csrf
<div class="mb-3">
    <label for="nama_jadwal" class="form-label">Nama Jadwal</label>
    <input type="text" name="nama_jadwal" id="nama_jadwal" class="form-control" value="{{ old('nama_jadwal', $jadwal->nama_jadwal ?? '') }}" required>
</div>
