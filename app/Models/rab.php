<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rab extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function kegiatanr()
    {
        return $this->hasOne(kegiatan::class, 'id', 'id_kegiatan');
    }
    public function kror()
    {
        return $this->hasOne(kro::class, 'id', 'id_kro');
    }
    public function akunr()
    {
        return $this->hasOne(akun::class, 'id', 'id_akun');
    }
    public function ror()
    {
        return $this->hasOne(ro::class, 'id', 'ro');
    }
    public function komponenr()
    {
        return $this->hasOne(komponen::class, 'id', 'komponen');
    }
    public function subkomponenr()
    {
        return $this->hasOne(subkomponen::class, 'id', 'sub_komponen');
    }
    public function datakro()
    {
        return $this->hasMany(rab::class, 'id_kro', 'id_kro');
    }
    public function dataakunrkakl()
    {
        return $this->hasOne(akun_rkakl::class, 'id_rab', 'id');
    }
    public function jenisAkun()
    {
        return $this->hasMany(jenisAkunRkakl::class, 'id_rab', 'id');
    }
}
