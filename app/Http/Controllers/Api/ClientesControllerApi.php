<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\clientes;
use Illuminate\Http\Request;

class ClientesControllerApi extends Controller
{
    public function index()
    {
        $clientesList = clientes::all();
        return response()->json([
            "success" => true,
            "message" => "Lista de clientes",
            "data" => $clientesList
        ]);
    }
}
