<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\servicos;
use Illuminate\Http\Request;

class ServicosControllerApi extends Controller
{
    public function index()
    {
        $servicosList = servicos::all();
        return response()->json([
            "success" => true,
            "message" => "Lista de servicos",
            "data" => $servicosList
        ]);
    }
}
