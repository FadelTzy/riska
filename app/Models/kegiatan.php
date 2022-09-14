<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{

    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'kegiatan';
    use HasFactory;
    public function kroitem()
    {
        return $this->hasMany(kro::class, 'id_kegiatan', 'id');
    }
}
