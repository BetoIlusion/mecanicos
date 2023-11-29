<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    use HasFactory;

    protected $table = 'tallers';
    protected $fillable = [
        'nit',
        'nombre',
        'telefono',
        'id_user',
    ];
}
