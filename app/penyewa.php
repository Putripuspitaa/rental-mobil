<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penyewa extends Model
{
    protected $table="penyewa";
    protected $primaryKey="id";
    public $timestamps= false;
    protected $fillable = [
      'nama_penyewa', 'alamat', 'telp', 'nomor_ktp', 'foto'
    ];
}
