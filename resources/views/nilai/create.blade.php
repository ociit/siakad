@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Nilai Mahasiswa</h3>
    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        @include('nilai.partials.form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
