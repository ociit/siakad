<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKuliahsTable extends Migration
{
    public function up()
    {
        Schema::create('jadwal_kuliahs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('matakuliah_id')
                    ->constrained('matakuliahs')
                    ->onDelete('cascade');

            $table->string('dosen_nip', 20);
            $table->foreign('dosen_nip')
                    ->references('nip')
                    ->on('dosens')
                    ->onDelete('cascade');

            $table->string('hari', 10); // contoh: Senin, Selasa, Rabu
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('ruangan', 50);
            $table->integer('semester');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_kuliahs');
    }
}
