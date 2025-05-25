@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h3>Edit Jurusan - {{ $jurusan->departemen->nama_departemen }}</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('jurusan.partials.form', [
                        'submit' => 'Update',
                        'jurusan' => $jurusan,
                    ])
                </form>
            </div>
        </div>
    </div>
@endsection
