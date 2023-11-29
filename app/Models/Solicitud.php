<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicituds';

    protected $fillable = [
        'descripcion',
        'ruta_image',
        'ruta_audio',
        'id_cliente',
        'id_estado',
        'id_ubicacion'
    ];
}
