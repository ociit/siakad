@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mahasiswa</h1>

    <form action="{{ route('mahasiswa.update', $mahasiswa->nrp) }}" method="POST">
        @csrf
        @method('PUT')

        @include('mahasiswa.partials.form', ['mahasiswa' => $mahasiswa])

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
