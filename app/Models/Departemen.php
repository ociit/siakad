<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemens';
    protected $fillable = ['nama_departemen'];

    public function jurusans() {
        return $this->hasMany(Jurusan::class);
    }
}
