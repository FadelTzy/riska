<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rkakl extends Model
{
    protected   $table = 'rkakl';
    use HasFactory;
    protected $guarded = [];
    public function datarab()
    {
        return $this->hasMany(rab::class, 'id_rkakl', 'id');
    }
    public function rabkekro()
    {
        return $this->hasMany(rab_kekro::class, 'id_rkakl', 'id');
    }
    public function revici()
    {
        return $this->hasOne(RiwayatRevisi::class, 'id_rkakl', 'id')->where('status_aktivasi',1);
    }
}
