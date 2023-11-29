<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';

    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'tipo_combustible',
        'capacidad_motor',
        'kilometraje',
        'id_cliente'
    ];
}
