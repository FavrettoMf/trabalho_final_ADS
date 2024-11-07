<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\veiculos;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientesController extends Controller
{
    //
    public function index()
    {
        //usaremos a model para buscar os alunos
        //select * from alunos order by nome asc
        $listaClientes = DB::table('clientes')->orderBy('nome', 'asc')->get();
        $listaClientes = json_decode($listaClientes, true);

        $total = DB::table('clientes')->count();
        //dd($listaAlunos);
        return view('clientes.index', ['clientes' => $listaClientes, 'total' => $total ]);
    }

    public function create()
    {
        //alguma lógica aqui
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:15',
            'cpf' => 'required|string|unique:clientes,cpf',
        ], [
            'cpf.unique' => 'Este CPF já está cadastrado.', // Mensagem personalizada
            'cpf.required' => 'O CPF é obrigatório.',       // Outras mensagens personalizadas, se necessário
        ]);

        try {
            Clientes::create($request->all());
            return redirect('/clientes')->with('success','Cliente salvo com sucesso');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) { // Código de erro para violação de chave única
                return redirect()->back()->withErrors(['cpf' => '']);
            } 
        }
        
        
    }
    public function getVeiculos($id)
{
    $veiculos = veiculos::where('id_cliente', $id)->get();
    return response()->json($veiculos);
}



    public function edit($id)
    {
        //find é o método que faz select * from clientes where id= ?
        $clientes = Clientes::find($id);
        //retornamos a view passando a TUPLA de clientes consultado
        return view('clientes.edit', ['clientes' => $clientes]);

        return redirect('/clientes')->with('success','Cliente salvo com sucesso');

    }

    public function update(Request $request)
    {
        //find é o método que faz select * from clientes where id= ?
        $clientes = Clientes::find($request->id);
        //método update faz um update clientes set nome = ?, idade=? ...
        $clientes->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf
        ]);
        return redirect('/clientes')->with('success','Cliente editado com sucesso');
    }

    public function destroy($id)
    {
        //select * from aluno where id = ?
        $clientes = Clientes::find($id);
        //deleta o aluno no banco
        $clientes->delete();

        return redirect('/clientes')->with('success','Cliente excluido com sucesso');
    }
    
}
