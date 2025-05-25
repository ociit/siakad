@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Nilai Mahasiswa</h3>
    <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('nilai.partials.form')
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
