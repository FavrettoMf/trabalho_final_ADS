<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class veiculos extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca', 'placa', 'ano', 'modelo', 'id_cliente'
        // Adicione os campos da tabela veiculos
    ];

    // Definindo a relação com o modelo Servicos
    public function servicos()
    {
        return $this->hasMany(Servicos::class, 'veiculos_id');
    }

    // Definindo a relação com o modelo Clientes (caso seja aplicável)
    public function clientes()
    {
        return $this->belongsTo(Clientes::class, 'id_cliente'); // Ajuste o nome da chave se necessário
    }
}


