<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antropometri extends Model
{
    protected $table = 'antropometris';

    use HasFactory;

    protected $fillable = [
        'umur',
        '-3sd',
        '-2sd',
        '-1sd',
        'median',
        '+3sd',
        '+2sd',
        '+1sd',
        'created_at',
    ];
}
