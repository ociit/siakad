@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h3>Edit Departemen</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('departemen.update', $departemen->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('departemen.partials.form', [
                        'submit' => 'Update',
                        'departemen' => $departemen,
                    ])
                </form>
            </div>
        </div>
    </div>
@endsection
