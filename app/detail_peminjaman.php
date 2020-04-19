<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_peminjaman extends Model
{
    protected $table="detail_peminjaman";
    protected $primaryKey="id";
    public $timestamps= false;
    protected $fillable = [
      'id_pinjam', 'id_mobil'
    ];
}
