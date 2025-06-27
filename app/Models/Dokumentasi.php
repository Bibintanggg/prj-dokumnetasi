<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokumentasi extends Model
{
    //
    use HasFactory;
    protected $table = 'dokumentasi';
    protected $fillable = [
        'user_id',
        'tanggal',
        'judul',
        'kegiatan',
        'kendala',
        'deskripsi_kendala',
    ];

    protected $casts = [
        'tanggal' => 'date'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
