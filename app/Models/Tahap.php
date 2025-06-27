<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tahap extends Model
{
    //

    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class, 'tahap_id');
    }
}
