@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Daftar Departemen</h3>
        <a href="{{ route('departemen.create') }}" class="btn btn-success mb-3">Tambah Departemen</a>
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama Departemen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departemens as $index => $dep)
                    <tr>
                        <td>{{ $dep->nama_departemen }}</td>
                        <td>
                            <a href="{{ route('jurusan.index', $dep->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('departemen.edit', $dep->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('departemen.destroy', $dep->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus? Semua jurusan juga akan dihapus!')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($departemens->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center">Belum ada departemen.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
