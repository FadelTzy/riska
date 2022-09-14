<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komponen extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'komponen';
    use HasFactory;
    public function subkomponenitem()
    {
        return $this->hasMany(subkomponen::class, 'id_komponen', 'id');
    }
}
