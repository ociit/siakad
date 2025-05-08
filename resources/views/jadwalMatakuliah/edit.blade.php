@extends('layouts.app')

@section('content')
    <h1>Edit Matakuliah pada {{ $jadwal->nama_jadwal }}</h1>
    <form action="{{ route('jadwalMatakuliah.update', [$jadwal->id, $detail->id]) }}" method="POST">
        @method('PUT')
        @include('jadwalMatakuliah.partials.form')
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
