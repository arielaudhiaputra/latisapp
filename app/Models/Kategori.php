<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori'; 

    protected $fillable = [
        'nama',
    ];

    public function siswas()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}

