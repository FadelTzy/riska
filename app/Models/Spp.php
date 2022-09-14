<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $guarded = [];
    public function dataakunrkakl()
    {
        return $this->hasMany(akun_rkakl::class, 'id_spp', 'id');
    }

    public function sp()
    {
        return $this->hasOne(SifatPembayaran::class, 'id', 'id_sifat_pembayaran');
    }
    public function jb()
    {
        return $this->hasOne(jenis_belanja::class, 'id', 'id_jenis_belanja');
    }
    public function akunrk()
    {
        return $this->hasOne(rkakl::class, 'id', 'id_rkakl');
    }
    public function dp()
    {
        return $this->hasOne(DasarPembayaran::class, 'id', 'id_dasar_pembayaran');
    }
    public function cb()
    {
        return $this->hasOne(CaraBayar::class, 'id', 'id_cara_bayar');
    }
    public function js()
    {
        return $this->hasOne(Jenisspm::class, 'id', 'id_jenis_spm');
    }
    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'id_supplier');
    }
    public function pejabat_pp()
    {
        return $this->hasOne(Pejabat::class, 'id', 'penguji_penerbit');
    }
    public function pejabat_pk()
    {
        return $this->hasOne(Pejabat::class, 'id', 'pembuat_komitmen');
    }
    public function kp()
    {
        return $this->hasOne(KewenanganPelaksanaan::class, 'id', 'id_kp');
    }
    public function jp()
    {
        return $this->hasOne(JenisPembayaran::class, 'id', 'id_jenis_pembayaran');
    }
    use HasFactory;
}
