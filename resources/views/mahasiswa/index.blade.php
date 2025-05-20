@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Mahasiswa</h1>

    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Jurusan</th> {{-- Tambahan --}}
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswas as $mhs)
            <tr>
                <td>{{ $mhs->nrp }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->email }}</td>
                <td>{{ $mhs->kelas->nama_kelas ?? '-' }}</td>
                <td>{{ $mhs->kelas->jurusan->nama_jurusan ?? '-' }}</td> {{-- Tambahan --}}
                <td>{{ $mhs->semester }}</td>
                <td>
                    <a href="{{ route('mahasiswa.show', $mhs->nrp) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('mahasiswa.edit', $mhs->nrp) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('mahasiswa.destroy', $mhs->nrp) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
