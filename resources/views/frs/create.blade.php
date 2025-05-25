@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah FRS Mahasiswa</h1>

    <form action="{{ route('frs-mahasiswa.store') }}" method="POST">
        @include('frs.partials.form', ['submitButton' => 'Simpan'])
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
