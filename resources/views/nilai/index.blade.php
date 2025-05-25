@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Nilai Mahasiswa</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('nilai.create') }}" class="btn btn-primary mb-3">+ Tambah Nilai</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NRP</th>
                <th>Nama Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Semester</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Tugas</th>
                <th>Nilai Akhir</th>
                <th>Grade</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($nilai as $n)
                <tr>
                    <td>{{ $n->mahasiswa_nrp }}</td>
                    <td>{{ $n->mahasiswa->nama ?? '-' }}</td>
                    <td>{{ $n->matakuliah->nama_matakuliah ?? '-' }}</td>
                    <td>{{ $n->dosen->nama ?? '-' }}</td>
                    <td>{{ $n->semester }}</td>
                    <td>{{ $n->nilai_uts }}</td>
                    <td>{{ $n->nilai_uas }}</td>
                    <td>{{ $n->nilai_tugas }}</td>
                    <td>{{ $n->nilai_akhir }}</td>
                    <td>{{ $n->grade }}</td>
                    <td>
                        <a href="{{ route('nilai.edit', $n->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('nilai.destroy', $n->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="11" class="text-center">Belum ada data nilai</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
