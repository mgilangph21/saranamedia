<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jpo extends Model
{
    use HasFactory;
    protected $table = 'jpo';
    protected $fillable = [
        'nama',
        'lokasi',
        'gambar',
        'detil',
        'status'
    ];
}