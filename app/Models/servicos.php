<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicos extends Model
{
    use HasFactory;
    protected $fillable = [
        'veiculos_id',        // ID do veículo
        'tipo_servicos_id',   // ID do tipo de serviço
        'defeito',            // Descrição do defeito do veículo
        'status',             // Status do serviço
        'placa',              // Placa do veículo
        'modelo',             // Modelo do veículo
        'nome_cliente',       // Nome do cliente
        'tipo',               // Tipo do serviço
        'tempo_estimado'      // Tempo estimado do serviço
    ];
}
