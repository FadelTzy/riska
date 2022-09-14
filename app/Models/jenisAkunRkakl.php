<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisAkunRkakl extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function akunr()
    {
        return $this->hasOne(akun::class, 'id', 'id_akun');
    }
}
