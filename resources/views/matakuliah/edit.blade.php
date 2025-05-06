@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Mata Kuliah</h2>
        <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('matakuliah.partials.form', ['matakuliah' => $matakuliah])
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
