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
        Schema::create('cliente_tallers', function (Blueprint $table) {
            $table->id();
            $table->string('comentario');
            $table->decimal('precio_estimado', 8, 2); 
            $table->integer('tiempo_estimado');
            $table->unsignedBigInteger('id_taller'); 
            $table->foreign('id_taller')->references('id')->on('tallers');
            $table->unsignedBigInteger('id_cliente'); 
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->unsignedBigInteger('id_estado'); 
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_tallers');
    }
};
