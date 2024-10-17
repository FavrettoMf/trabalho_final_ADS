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
            $table->id();  // Chave primária da tabela 'servicos'
            
            // Relacionamento com a tabela 'veiculos'
            $table->unsignedBigInteger('veiculos_id');  // Chave estrangeira de 'veiculos'
            $table->string('placa');  // Placa do veículo (pode já estar em 'veiculos')
            $table->string('modelo'); // Modelo do veículo
            $table->string('nome_cliente');  // Nome do cliente vinculado ao veículo
            
            // Relacionamento com a tabela 'tipo_servicos'
            $table->unsignedBigInteger('tipo_servicos_id');  // Chave estrangeira de 'tipo_servicos'
            $table->string('tipo');  // Tipo de serviço (Ex: troca de óleo)
            $table->integer('tempo_estimado');  // Tempo estimado do serviço (em minutos)

            // Defeito e Status
            $table->text('defeito');  // Descrição do defeito do veículo
            $table->enum('status', ['Em análise', 'Em andamento', 'Concluído'])->default('Em análise');  // Status do serviço

            $table->timestamps();  // Timestamps 'created_at' e 'updated_at'

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
