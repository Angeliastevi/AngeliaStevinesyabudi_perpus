<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeminjamanModel extends Model
{
    protected $table="peminjaman";
    protected $primaryKey="id";

    protected $fillable = [
        'id_anggota', 'id_petugas', 'tgl_pinjam', 'deadline', 'tgl_kembali'
    ];
}
