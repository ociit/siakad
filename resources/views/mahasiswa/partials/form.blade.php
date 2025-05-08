<div class="mb-3">
    <label>NRP</label>
    <input type="text" name="nrp" class="form-control" value="{{ old('nrp', $mahasiswa->nrp ?? '') }}" {{ Route::currentRouteName() === 'mahasiswa.edit' ? 'disabled' : '' }}>
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
    <select name="kelas_id" id="kelas_id" class="form-control">
        <option value="">-- Pilih Kelas --</option>
        @foreach($kelas as $kls)
            <option value="{{ $kls->id }}" data-semester="{{ $kls->semester }}"
                {{ old('kelas_id', $mahasiswa->kelas_id ?? '') == $kls->id ? 'selected' : '' }}>
                {{ $kls->nama_kelas }}
            </option>
        @endforeach
    </select>
</div>

{{-- Field semester disembunyikan --}}
<input type="hidden" name="semester" id="semester" value="{{ old('semester', $mahasiswa->semester ?? '') }}">

<div class="mb-3">
    <label>No. Telepon</label>
    <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp', $mahasiswa->no_telp ?? '') }}">
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const kelasSelect = document.getElementById('kelas_id');
        const semesterInput = document.getElementById('semester');

        kelasSelect.addEventListener('change', function () {
            const selectedOption = kelasSelect.options[kelasSelect.selectedIndex];
            const semester = selectedOption.getAttribute('data-semester');
            semesterInput.value = semester;
        });

        // Set initial value on page load (saat edit)
        const selectedOption = kelasSelect.options[kelasSelect.selectedIndex];
        if (selectedOption) {
            const semester = selectedOption.getAttribute('data-semester');
            if (semester) semesterInput.value = semester;
        }
    });
</script>