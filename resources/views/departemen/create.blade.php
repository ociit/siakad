@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Tambah Departemen</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('departemen.store') }}" method="POST">
                    @csrf
                    @include('departemen.partials.form', ['submit' => 'Simpan'])
                </form>
            </div>
        </div>
    </div>
@endsection
