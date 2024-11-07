<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicos extends Model
{
    use HasFactory;

    protected $fillable = [
        'veiculos_id',
        'tipo_servicos_id',
        'defeito',
        'status',
    ];

    // Definindo a relação com o modelo Veiculos
    public function veiculos()
    {
        return $this->belongsTo(Veiculos::class, 'veiculos_id');
    }
    

    // Definindo a relação com o modelo TipoServicos
    public function tipo_servicos()
    {
        return $this->belongsTo(tipo_servicos::class, 'tipo_servicos_id');
    }
}