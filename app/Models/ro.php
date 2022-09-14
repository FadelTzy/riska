<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ro extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'ro';
    use HasFactory;
    public function komponenitem()
    {
        return $this->hasMany(komponen::class, 'id_ro', 'id');
    }
}
