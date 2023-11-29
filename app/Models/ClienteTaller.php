<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteTaller extends Model
{
    use HasFactory;

    protected $table = 'cliente_tallers';

    protected $fillable = [
        'comentario',
        'precio_estimado',
        'tiempo_estimado',
        'id_taller',
        'id_cliente',
        'id_estado'
    ];
}
