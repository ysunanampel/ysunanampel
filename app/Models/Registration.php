<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'nik',
        'gender',
        'birth_date',
        'address',
        'parent_name',
        'program_type',
        'status', // Jangan lupakan satpam status ini ya!
    ];
}