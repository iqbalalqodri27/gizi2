<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imt_umur extends Model
{
    protected $table = 'imt_umurs';

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
