<?php

namespace App\Http\Controllers;
use App\Models\servicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServicosController extends Controller
{
    //
    public function index()
    {
        //usaremos a model para buscar os servicos
        //select * from servicos order by nome asc
        $listaServicos = DB::table('servicos')->orderBy('nome', 'asc')->get();
        $listaServicos = json_decode($listaServicos, true);

        $total = DB::table('servicos')->count();
        //dd($listaAlunos);
        return view('servicos.index', ['servicos' => $listaServicos, 'total' => $total ]);
    }

    public function create()
    {
        //alguma lógica aqui
        return view('servicos.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nome' => 'required|min:2|max:50',
        ]);

        Servicos::create([
            'nome' => $request->nome,
            'marmod' => $request->marmod,
            'placa' => $request->placa,
            'defeito' => $request->defeito
        ]);
        
        return redirect('/servicos')->with('success','Servico salvo com sucesso');

    }

    public function edit($id)
    {
        //find é o método que faz select * from alunos where id= ?
        $servicos = Servicos::find($id);
        //retornamos a view passando a TUPLA de aluno consultado
        return view('servicos.edit', ['servicos' => $servicos]);

        return redirect('/servicos')->with('success','Servicos  salvo com sucesso');

    }

    public function update(Request $request)
    {
        //find é o método que faz select * from alunos where id= ?
        $servicos = Servicos::find($request->id);
        //método update faz um update aluno set nome = ?, idade=? ...
        $servicos->update([
            'nome' => $request->nome,
            'marmod' => $request->marmod,
            'placa' => $request->placa,
            'defeito' => $request->defeito
        ]);
        return redirect('/servicos')->with('success','Servicos editado com sucesso');
    }

    public function destroy($id)
    {
        //select * from aluno where id = ?
        $servicos = Servicos::find($id);
        //deleta o aluno no banco
        $servicos->delete();

        return redirect('/servicos')->with('success','servicoss excluido com sucesso');
    }
}

