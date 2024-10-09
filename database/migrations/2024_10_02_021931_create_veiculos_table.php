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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id(); // Cria uma chave primária com auto incremento
            $table->string('Marca'); // Marca: Texto(1)
            $table->string('placa'); // placa: Texto(1)
            $table->string('ano'); // ano: Texto(1)
            $table->string('modelo'); // modelo: Texto(1)

            // Coluna de chave estrangeira
            $table->unsignedBigInteger('id_cliente'); // Referência para a coluna 'id' da tabela 'clientes'
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade'); // Referência à tabela clientes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
