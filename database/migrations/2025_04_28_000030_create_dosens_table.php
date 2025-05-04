<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->string('nip', 20)->primary();
            $table->string('nama', 100);
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('jurusan_id')
                ->constrained('jurusans')
                ->onDelete('cascade');
            $table->string('no_telp', 20)->nullable();
            $table->boolean('isDosenWali')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
