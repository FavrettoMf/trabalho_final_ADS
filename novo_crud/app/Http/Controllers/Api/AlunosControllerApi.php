<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunosControllerApi extends Controller
{
    public function index()
    {
        $alunosList = Aluno::all();
        return response()->json([
            "success" => true,
            "message" => "Lista de alunos",
            "data" => $alunosList
        ]);
    }
}
