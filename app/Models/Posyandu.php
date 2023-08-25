<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Child;
use App\Models\Mothers;


class Posyandu extends Model
{
    protected $table = 'posyandus';

    use HasFactory;

    protected $fillable = [
        'child_id',
        'berat_badan',
        'tinggi_badan',
        'lingkaran_kepala',
        'status_gizi',
        'kalkulasi_bbu',
        'kalkulasi_imt',
        'bmi',
        'created_at',
        'updated_at',
    ];

    public function child()
    {
    	return $this->belongsTo(Child::class,'child_id');
    }
   

}
