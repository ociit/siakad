@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Log FRS Seluruh Mahasiswa</h1>
    <a href="{{ route('frs-mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah FRS</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NRP</th>
                <th>Nama Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Tanggal Pengajuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($frs as $item)
                <tr>
                    <td>{{ $item->mahasiswa_nrp }}</td>
                    <td>{{ $item->mahasiswa->nama }}</td>
                    <td>{{ $item->matakuliah->nama_matakuliah }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->tanggal_pengajuan }}</td>
                    <td>
                        <a href="{{ route('frs-mahasiswa.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('frs-mahasiswa.destroy', $item->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mahasiswaSelect = document.getElementById('mahasiswa_nrp');
        const semesterInput = document.getElementById('semester');

        mahasiswaSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const semester = selectedOption.getAttribute('data-semester');
            
            if (semester) {
                semesterInput.value = semester;
            } else {
                semesterInput.value = '';
            }
        });

        // Optional: trigger change once on load (for edit page)
        mahasiswaSelect.dispatchEvent(new Event('change'));
    });
</script>
@endsection
