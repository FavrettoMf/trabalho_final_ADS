<?php

namespace App\Http\Controllers;

use App\Models\veiculos;
use App\Models\clientes; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VeiculosController extends Controller


{
    //
    public function index()
    {
        // Consulta usando join para pegar o nome do cliente associado ao veículo
        $listaVeiculos = DB::table('veiculos')
                            ->join('clientes', 'veiculos.id_cliente', '=', 'clientes.id')
                            ->select('veiculos.*', 'clientes.nome as nome_cliente')
                            ->orderBy('veiculos.marca', 'asc')
                            ->get();
    
        $listaVeiculos = json_decode($listaVeiculos, true);
        $total = DB::table('veiculos')->count();
    
        return view('veiculos.index', ['veiculos' => $listaVeiculos, 'total' => $total]);
    }

    

    public function create() {
        // Busca todos os clientes cadastrados no banco
        $clientes = clientes::all();
    
        // Passa os clientes para a view
        return view('veiculos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'marca' => 'required|string|max:255',
            'placa' => 'required|string|max:10',
            'ano' => 'required|integer',
            'modelo' => 'required|string|max:255',
            'id_cliente' => 'required|integer|exists:clientes,id', // Certifique-se que o cliente existe
        ]);
    
        // Criar um novo veículo com os dados do formulário
        Veiculos::create([
            'marca' => $request->marca,
            'placa' => $request->placa,
            'ano' => $request->ano,
            'modelo' => $request->modelo,
            'id_cliente' => $request->id_cliente,
        ]);
        
        return redirect('/veiculos')->with('success','Veiculo salvo com sucesso');
    }

    public function update(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'marca' => 'required|string|max:255',
            'placa' => 'required|string|max:10',
            'ano' => 'required|integer',
            'modelo' => 'required|string|max:255',
            'id_cliente' => 'required|integer|exists:clientes,id'  // Certificar que o cliente existe
        ]);
    
        // Buscar o veículo pelo ID
        $veiculo = Veiculos::findOrFail($request->id);
    
        // Atualizar o veículo
        $veiculo->update([
            'marca' => $request->marca,
            'placa' => $request->placa,
            'ano' => $request->ano,
            'modelo' => $request->modelo,
            'id_cliente' => $request->id_cliente,
        ]);
    
        return redirect('/veiculos')->with('success', 'Veículo atualizado com sucesso');
    }

    public function edit($id)
{
    // Buscar o veículo pelo ID
    $veiculo = Veiculos::findOrFail($id);  // Usar findOrFail para retornar erro 404 se não encontrar

    // Buscar todos os clientes para preencher a lista de seleção
    $clientes = Clientes::all();

    // Passar o veículo e os clientes para a view de edição
    return view('veiculos.edit', compact('veiculo', 'clientes'));
}


    public function destroy($id)
    {
        //select * from veiculos where id = ?
        $veiculos = Veiculos::find($id);
        //deleta o veiculos no banco
        $veiculos->delete();

        return redirect('/veiculos')->with('success','Veiculos excluido com sucesso');
    }
    
}
