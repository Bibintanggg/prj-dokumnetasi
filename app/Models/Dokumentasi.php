<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokumentasi extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tanggal',
        'judul',
        'kegiatan',
        'kendala',
        'deskripsi_kendala',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
