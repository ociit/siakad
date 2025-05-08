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
            $table->string('nama_jadwal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_kuliahs');
    }
}
