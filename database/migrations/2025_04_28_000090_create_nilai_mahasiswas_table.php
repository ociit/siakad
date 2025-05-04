<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiMahasiswasTable extends Migration
{
    public function up()
    {
        Schema::create('nilai_mahasiswas', function (Blueprint $table) {
            $table->id();

            // Karena NRP adalah string/char di banyak kampus, kita pakai string
            $table->string('mahasiswa_nrp', 20);
            $table->foreign('mahasiswa_nrp')
                    ->references('nrp')
                    ->on('mahasiswas')
                    ->onDelete('cascade');

            $table->foreignId('matakuliah_id')
                    ->constrained('matakuliahs')
                    ->onDelete('cascade');

            $table->string('dosen_nip', 20);
            $table->foreign('dosen_nip')
                    ->references('nip')
                    ->on('dosens')
                    ->onDelete('cascade');

            $table->decimal('nilai_uts', 5, 2)->nullable();
            $table->decimal('nilai_uas', 5, 2)->nullable();
            $table->decimal('nilai_tugas', 5, 2)->nullable();
            $table->decimal('nilai_akhir', 5, 2)->nullable();

            $table->enum('grade', ['A', 'B', 'C', 'D', 'E', 'F'])->nullable();

            $table->integer('semester');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai_mahasiswas');
    }
}
