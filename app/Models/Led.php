<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Led extends Model
{
    use HasFactory;
    protected $table = 'led';
    protected $fillable = [
        'nama',
        'lokasi',
        'gambar',
        'detil',
        'status'
    ];
}