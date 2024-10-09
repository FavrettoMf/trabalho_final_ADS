<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\veiculos;
use Illuminate\Http\Request;

class VeiculosControllerApi extends Controller
{
    public function index()
    {
        $veiculosList = veiculos::all();
        return response()->json([
            "success" => true,
            "message" => "Lista de veiculos",
            "data" => $veiculosList
        ]);
    }
}
