<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi (Mass Assignment)
     */
    protected $guarded = [];

    /**
     * Konversi tipe data otomatis
     * images: diubah dari JSON di database menjadi Array di PHP
     */
    protected $casts = [
        'images' => 'array',
    ];
}