@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit FRS Mahasiswa</h1>

    <form action="{{ route('frs-mahasiswa.update', $frs_mahasiswa->id) }}" method="POST">
        @method('PUT')
        @include('frs.partials.form', ['submitButton' => 'Update'])
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mahasiswaSelect = document.getElementById('mahasiswa_nrp');
        const semesterInput = document.getElementById('semester');

        mahasiswaSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const semester = selectedOption.getAttribute('data-semester');
            
            if (semester) {
                semesterInput.value = semester;
            } else {
                semesterInput.value = '';
            }
        });

        // Optional: trigger change once on load (for edit page)
        mahasiswaSelect.dispatchEvent(new Event('change'));
    });
</script>
@endsection
