@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda --}}

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <h1 class="mb-4">Daftar Dosen</h1>
    <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">Tambah Dosen</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>No Telp</th>
                <th>Dosen Wali</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosen as $d)
            <tr>
                <td>{{ $d->nip }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->email }}</td>
                <td>{{ $d->jurusan->nama_jurusan ?? '-' }}</td>
                <td>{{ $d->no_telp ?? '-' }}</td>
                <td>{{ $d->isDosenWali ? 'Ya' : 'Tidak' }}</td>
                <td>
    <div class="d-flex gap-2">
        <a href="{{ route('dosen.show', $d->nip) }}" class="btn btn-sm btn-info">Detail</a>
        <a href="{{ route('dosen.edit', $d->nip) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('dosen.destroy', $d->nip) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dosen ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        </form>
    </div>
</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
