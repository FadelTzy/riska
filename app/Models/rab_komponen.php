<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rab_komponen extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rkom()
    {
        return $this->hasOne(komponen::class, 'id', 'id_komponen');
    }
    public function mSub()
    {
        return $this->hasMany(subkomponen::class, 'id_komponen', 'id_komponen');
    }
    public function mSubnya()
    {
        return $this->hasMany(rab_sub::class, 'id_rab_komponen', 'id');
    }
    public function oRo()
    {
        return $this->hasOne(rab_ro::class, 'id', 'id_rab_ro');
    }
}
