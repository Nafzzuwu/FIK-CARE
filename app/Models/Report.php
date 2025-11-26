<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'nama_pelapor',
        'kategori',
        'isi_laporan',
        'tanggal',
        'status'
    ];


    // relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
