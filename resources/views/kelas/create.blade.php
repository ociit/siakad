@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kelas</h1>

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf

        @include('kelas.partials.form', ['kelas' => null])

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
