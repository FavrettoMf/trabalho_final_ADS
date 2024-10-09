<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_servicos', function (Blueprint $table) {
            $table->id();  // Chave primária
            $table->string('tipo');  // Tipo do serviço (e.g., troca de óleo)
            $table->integer('tempo_estimado');  // Tempo estimado em minutos
            $table->decimal('custo_medio', 8, 2);  // Custo médio (até 8 dígitos com 2 casas decimais)
            $table->timestamps();  // Colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_servicos');
    }
}
