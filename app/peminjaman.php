<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $table="peminjaman";
    protected $primaryKey="id";
    public $timestamps= false;
    protected $fillable = [
      'id_petugas', 'id_penyewa', 'tgl_pinjam', 'deadline', 'denda'
    ];
}
