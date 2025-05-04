<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';
    protected $fillable = ['nama_jurusan', 'departemen_id'];
    public function departemen(){
        return $this->belongsTo(Departemen::class);
    }

    public function dosens() {
        return $this->hasMany(Dosen::class);
    }

    public function kelas() {
        return $this->hasMany(Kelas::class);
    }

    public function mataKuliahs() {
        return $this->hasMany(MataKuliah::class);
    }
}
