<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rab_detail_rinci extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function mDetail()
    {
        return $this->hasMany(rab_detail::class, 'id_cabang', 'id');
    }
}
