@extends('layouts.app')

@section('content')
    <h1>Edit Jadwal Kuliah</h1>
    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
        @method('PUT')
        @include('jadwal.partials.form')
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
