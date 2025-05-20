@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Mata Kuliah</h2>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tombol Tambah --}}
        <a href="{{ route('matakuliah.create') }}" class="btn btn-success mb-3">Tambah Mata Kuliah</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Mata Kuliah</th>
                    <th>Dosen Pengampu</th>
                    <th>Jurusan</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matakuliahs as $mk)
                    <tr>
                        <td>{{ $mk->nama_matakuliah }}</td>
                        <td>{{ $mk->dosen->nama ?? '-' }}</td>
                        <td>{{ $mk->jurusan->nama_jurusan ?? '-' }}</td>
                        <td>{{ $mk->sks }}</td>
                        <td>{{ $mk->semester }}</td>
                        <td>
                            <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada mata kuliah</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
