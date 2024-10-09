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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // Cria uma chave primária com auto incremento
            $table->string('nome'); // Coluna para o nome do cliente
            $table->string('email')->unique(); // Coluna de email, com valor único
            $table->string('telefone'); // Coluna para o telefone
            $table->string('cpf')->unique(); // Coluna para o cpf
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};

