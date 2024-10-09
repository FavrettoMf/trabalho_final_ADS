<?php

namespace App\Http\Controllers;

use App\Models\clientes;
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
        //dd($request->all());
        $request->validate([
            'nome' => 'required|min:2|max:50',
            'email' => 'email:rfc,dns'
        ]);

        Clientes::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf
        ]);
        
        return redirect('/clientes')->with('success','Cliente salvo com sucesso');

    }

    public function edit($id)
    {
        //find é o método que faz select * from alunos where id= ?
        $clientes = Clientes::find($id);
        //retornamos a view passando a TUPLA de aluno consultado
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
