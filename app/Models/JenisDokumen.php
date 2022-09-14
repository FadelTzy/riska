<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDokumen extends Model
{
    protected $guarded = [];
    public function dasarpembayaranr()
    {
        return $this->hasOne(DasarPembayaran::class, 'id', 'id_dasar_pembayaran');
    }
    use HasFactory;
}
