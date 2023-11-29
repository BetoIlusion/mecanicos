<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            [
                'estado' => 'solicitado'
            ],
            [
                'estado' => 'aceptado'
            ],
            [
                'estado' => 'cancelado'
            ],
            [
                'estado' => 'espera'
            ],
            [
                'estado' => 'confirmado'
            ],
            [
                'estado' => 'finalizado'
            ],
            [
                'estado' => 'habilitado'
            ],
            [
                'estado' => 'inhabilitado'
            ]
        ];

        foreach ($estados as $estado) {
            Estado::create($estado);
        }
    }
}
