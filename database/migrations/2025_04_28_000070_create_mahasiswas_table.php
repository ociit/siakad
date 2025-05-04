<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->string('nrp', 20)->primary();
            $table->string('nama', 100);
            $table->string('email')->unique();
            $table->string('password');

            $table->foreignId('kelas_id')
                ->constrained('kelas')
                ->onDelete('cascade');
            
                $table->integer('semester');
            $table->string('no_telp', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
