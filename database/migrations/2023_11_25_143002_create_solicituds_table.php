<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('ruta_image');
            $table->string('ruta_audio');
            $table->unsignedBigInteger('id_cliente'); 
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->unsignedBigInteger('id_estado'); 
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->unsignedBigInteger('id_ubicacion'); 
            // $table->foreign('id_ubicacion')->references('id')->on('ubicacions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicituds');
    }
};
