<div class="mb-3">
    <label for="nama_departemen" class="form-label">Nama Departemen</label>
    <input type="text" name="nama_departemen" id="nama_departemen"
        class="form-control @error('nama_departemen') is-invalid @enderror"
        value="{{ old('nama_departemen', $departemen->nama_departemen ?? '') }}" required>
    @error('nama_departemen')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $submit }}</button>
<a href="{{ route('departemen.index') }}" class="btn btn-secondary">Kembali</a>
