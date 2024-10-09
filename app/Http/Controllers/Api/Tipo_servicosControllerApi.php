<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\tipo_servicos;
use Illuminate\Http\Request;

class Tipo_servicosControllerApi extends Controller
{
    public function index()
    {
        $tipo_servicosList = tipo_servicos::all();
        return response()->json([
            "success" => true,
            "message" => "Lista de clientes",
            "data" => $tipo_servicosList
        ]);
    }
}
