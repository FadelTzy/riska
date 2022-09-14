<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akun_rkakl extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rab()
    {
        return $this->hasOne(rab::class, 'id', 'id_rab');
    }
}
