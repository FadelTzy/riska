<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rab_akun extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function mDetail()
    {
        return $this->hasMany(rab_detail::class, 'id_rab_akun', 'id');
    }
    public function mCabang()
    {
        return $this->hasMany(rab_detail_rinci::class, 'id_rab_akun', 'id');
    }
}
