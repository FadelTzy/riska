<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rab_sub extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function mAkun()
    {
        return $this->hasMany(rab_akun::class, 'id_rab_sub', 'id');
    }
    public function oKom()
    {
        return $this->hasOne(rab_komponen::class, 'id', 'id_rab_komponen');
    }
}
