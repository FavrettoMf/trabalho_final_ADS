<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class veiculos extends Model
{
    use HasFactory;
    protected $fillable = ['marca', 'placa', 'ano', 'modelo', 'id_cliente'];
}
