<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_servicos extends Model
{
    use HasFactory;
    protected $fillable = ['tipo', 'tempo_estimado', 'tempo_medio'];
}
