<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\servicos; // Certifique-se de que o nome do modelo está correto
use App\Models\tipo_servicos;
use App\Models\veiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServicosController extends Controller
{
    public function index()
    {
        // Usaremos a model para buscar os serviços
        $listaServicos = Servicos::orderBy('nome_cliente', 'asc')->with(['veiculo', 'tipoServico'])->get();
        $total = Servicos::count();

        return view('servicos.index', ['servicos' => $listaServicos, 'total' => $total]);
    }

   public function create()
{
    // Buscar todos os clientes e veículos
    $clientes = clientes::all(); // Certifique-se de que o modelo está correto
    $veiculos = veiculos::all(); // Certifique-se de que o modelo está correto
    $tipo_servicos = tipo_servicos::all(); // Certifique-se de que o modelo está correto

    return view('servicos.create', [
        'clientes' => $clientes,
        'veiculos' => $veiculos,
        'tipo_servicos' => $tipo_servicos
    ]);
}


    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'veiculos_id' => 'required|exists:veiculos,id',
            'tipo_servicos_id' => 'required|exists:tipo_servicos,id',
            'defeito' => 'required|string|max:255',
            'placa' => 'required|string|max:10',
            'modelo' => 'required|string|max:50',
            'nome_cliente' => 'required|string|max:50',
            'tipo' => 'required|string|max:50',
            'tempo_estimado' => 'required|integer|min:0',
            'status' => 'required|in:Em análise,Em andamento,Concluído',
        ]);

        // Criação do novo serviço
        Servicos::create([
            'veiculos_id' => $request->veiculos_id,
            'tipo_servicos_id' => $request->tipo_servicos_id,
            'defeito' => $request->defeito,
            'placa' => $request->placa,
            'modelo' => $request->modelo,
            'nome_cliente' => $request->nome_cliente,
            'tipo' => $request->tipo,
            'tempo_estimado' => $request->tempo_estimado,
            'status' => $request->status,
        ]);
        
        return redirect('/servicos')->with('success', 'Serviço salvo com sucesso');
    }

    public function edit($id)
    {
        // Busca o serviço pelo ID
        $servicos = Servicos::findOrFail($id);
        return view('servicos.edit', ['servicos' => $servicos]);
    }

    public function update(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'veiculos_id' => 'required|exists:veiculos,id',
            'tipo_servicos_id' => 'required|exists:tipo_servicos,id',
            'defeito' => 'required|string|max:255',
            'placa' => 'required|string|max:10',
            'modelo' => 'required|string|max:50',
            'nome_cliente' => 'required|string|max:50',
            'tipo' => 'required|string|max:50',
            'tempo_estimado' => 'required|integer|min:0',
            'status' => 'required|in:Em análise,Em andamento,Concluído',
        ]);

        // Busca o serviço pelo ID
        $servicos = Servicos::findOrFail($request->id);

        // Atualiza o serviço
        $servicos->update([
            'veiculos_id' => $request->veiculos_id,
            'tipo_servicos_id' => $request->tipo_servicos_id,
            'defeito' => $request->defeito,
            'placa' => $request->placa,
            'modelo' => $request->modelo,
            'nome_cliente' => $request->nome_cliente,
            'tipo' => $request->tipo,
            'tempo_estimado' => $request->tempo_estimado,
            'status' => $request->status,
        ]);

        return redirect('/servicos')->with('success', 'Serviço editado com sucesso');
    }

    public function destroy($id)
    {
        // Busca o serviço pelo ID
        $servicos = Servicos::findOrFail($id);
        // Deleta o serviço
        $servicos->delete();

        return redirect('/servicos')->with('success', 'Serviço excluído com sucesso');
    }
}
