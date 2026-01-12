<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    // Daftar kolom yang boleh diisi secara massal
    protected $fillable = [
        'name',
        'type',
        'head_of_institution',
        'description',
        'study_schedule',
        'image',
    ];
}