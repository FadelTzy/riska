<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kro extends Model
{

    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'kro';
    use HasFactory;
    public function roitem()
    {
        return $this->hasMany(ro::class, 'id_kro', 'id');
    }
}
