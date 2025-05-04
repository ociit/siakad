<div class="mb-3">
    <label>NRP</label>
    <input type="text" name="nrp" class="form-control" value="{{ old('nrp', $mahasiswa->nrp ?? '') }}" {{ isset($mahasiswa) ? 'readonly' : '' }}>
</div>

<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama ?? '') }}">
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $mahasiswa->email ?? '') }}">
</div>

@if(!isset($mahasiswa))
<div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
</div>
@endif

<div class="mb-3">
    <label>Kelas</label>
    <select name="kelas_id" class="form-control">
        @foreach($kelas as $kls)
            <option value="{{ $kls->id }}" {{ old('kelas_id', $mahasiswa->kelas_id ?? '') == $kls->id ? 'selected' : '' }}>
                {{ $kls->nama_kelas }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Semester</label>
    <input type="number" name="semester" class="form-control" value="{{ old('semester', $mahasiswa->semester ?? '') }}">
</div>

<div class="mb-3">
    <label>No. Telepon</label>
    <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp', $mahasiswa->no_telp ?? '') }}">
</div>
