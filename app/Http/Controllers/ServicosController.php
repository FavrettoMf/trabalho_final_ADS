<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Servicos;
use App\Models\tipo_servicos; // Certifique-se de que a model está no formato correto
use App\Models\Veiculos;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    public function index()
    {
        
        // Obtém todos os serviços e carrega as relações necessárias
        $servicos = Servicos::with(['veiculos', 'tipo_servicos'])->get();
    
        // Contadores de sericos concluidos
        $countConcluido = $servicos->where('status', 'Concluído')->count();
    
        return view('servicos.index', compact('servicos',  'countConcluido'));
    }

    
    
    public function create()
    {
        // Buscar todos os clientes, tipos de serviços e veículos
        $clientes = Clientes::all();
        $tipo_servicos = tipo_servicos::all();
        $veiculos = Veiculos::all(); // Corrigido para PascalCase

        return view('servicos.create', [
            'clientes' => $clientes,
            'tipo_servicos' => $tipo_servicos,
            'veiculos' => $veiculos
        ]);
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'veiculos_id' => 'required|exists:veiculos,id',
            'tipo_servicos_id' => 'required|exists:tipo_servicos,id',
            'defeito' => 'required|string|max:255',
            'status' => 'required|in:Em análise,Em andamento,Concluído',
        ]);

        // Criação do novo serviço
        Servicos::create($request->all());

        return redirect('/servicos')->with('success', 'Serviço salvo com sucesso');
    }

    public function edit($id)
    {
        // Busca o serviço pelo ID
        $servico = Servicos::findOrFail($id);
        $clientes = Clientes::all(); // Busca todos os clientes para o dropdown
        $tipo_servicos = tipo_servicos::all(); // Busca todos os tipos de serviços para o dropdown
        $veiculos = Veiculos::all(); // Busca todos os veículos para o dropdown

        return view('servicos.edit', [
            'servico' => $servico,
            'clientes' => $clientes,
            'tipo_servicos' => $tipo_servicos,
            'veiculos' => $veiculos
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'veiculos_id' => 'required|exists:veiculos,id',
            'tipo_servicos_id' => 'required|exists:tipo_servicos,id',
            'defeito' => 'required|string|max:255',
            'status' => 'required|in:Em análise,Em andamento,Concluído',
        ]);

        // Atualiza o serviço
        $servicos = Servicos::findOrFail($id);
        $servicos->update($request->all());

        return redirect('/servicos')->with('success', 'Serviço atualizado com sucesso');
    }

    public function destroy($id)
    {
        // Deleta o serviço
        $servico = Servicos::findOrFail($id);
        $servico->delete();

        return redirect('/servicos')->with('success', 'Serviço excluído com sucesso');
    }
}
