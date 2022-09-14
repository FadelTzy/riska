<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rab_ro extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ror()
    {
        return $this->hasOne(ro::class, 'id', 'id_ro');
    }
    public function mKomponen()
    {
        return $this->hasMany(komponen::class, 'id_ro', 'id_ro');
    }
    public function mkom()
    {
        return $this->hasMany(rab_komponen::class, 'id_rab_ro', 'id');
    }
    public function oKros()
    {
        return $this->hasOne(rab_kekro::class, 'id', 'id_rab_kekro');
    }

}
