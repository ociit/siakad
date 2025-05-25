@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Jurusan - {{ $departemen->nama_departemen }}</h3>
        <a href="{{ route('jurusan.create', $departemen->id) }}" class="btn btn-success mb-3">Tambah Jurusan</a>
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departemen->jurusans as $index => $jur)
                    <tr>
                        <td>{{ $jur->nama_jurusan }}</td>
                        <td>
                            <a href="{{ route('jurusan.edit', $jur->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('jurusan.destroy', $jur->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Hapus jurusan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($departemen->jurusans->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center">Belum ada jurusan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <a href="{{ route('departemen.index') }}" class="btn btn-secondary mt-3">Kembali ke Departemen</a>
    </div>
@endsection
