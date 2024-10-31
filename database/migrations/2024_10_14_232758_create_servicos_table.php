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
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
        
            // Relacionamento com 'veiculos' e 'tipo_servicos'
            $table->unsignedBigInteger('veiculos_id');  
            $table->unsignedBigInteger('tipo_servicos_id');
        
            // Informações do defeito e status
            $table->text('defeito');
            $table->enum('status', ['Em análise', 'Em andamento', 'Concluído'])->default('Em análise');
        
            $table->timestamps();
        
            // Definir chaves estrangeiras
            $table->foreign('veiculos_id')->references('id')->on('veiculos')->onDelete('cascade');
            $table->foreign('tipo_servicos_id')->references('id')->on('tipo_servicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
