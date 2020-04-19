<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    protected $table="mobil";
    protected $primaryKey="id";
    public $timestamps= false;
    protected $fillable = [
      'plat_nomor', 'merk', 'foto', 'keterangan'
    ];
}
