<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemens';
    protected $fillable = ['nama_departemen'];

    public $timestamps = true;
    protected $primaryKey = 'id';

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function jurusans()
    {
        return $this->hasMany(Jurusan::class);
    }
}
