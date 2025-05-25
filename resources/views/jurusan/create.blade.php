@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Tambah Jurusan untuk {{ $departemen->nama_departemen }}</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('jurusan.store', $departemen->id) }}" method="POST">
                    @csrf
                    @include('jurusan.partials.form', ['submit' => 'Simpan'])
                </form>
            </div>
        </div>
    </div>
@endsection
