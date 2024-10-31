<?php

namespace App\Http\Controllers;

use App\Models\tipo_servicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Tipo_servicosController extends Controller
{
    //
    public function index()
    {
        //usaremos a model para buscar os alunos
        //select * from alunos order by nome asc
        $listaTipo_servicos = DB::table('tipo_servicos')->orderBy('tipo', 'asc')->get();
        $listaTipo_servicos = json_decode($listaTipo_servicos, true);

        $total = DB::table('tipo_servicos')->count();
        //dd($listaTipo_servicos);
        return view('tipo_servicos.index', ['tipo_servicos' => $listaTipo_servicos, 'total' => $total ]);
    }

    public function create()
    {
        //alguma lógica aqui
        return view('tipo_servicos.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'tipo' => 'required|min:2|max:50',
            'email' => 'email:rfc,dns'
        ]);

        Tipo_servicos::create([
            'tipo' => $request->tipo,
            'tempo_estimado' => $request->tempo_estimado,
            'custo_medio' => $request->custo_medio
        ]);
        
        return redirect('/tipo_servicos')->with('success','Serviço salvo com sucesso');

    }

    public function edit($id)
    {
        //find é o método que faz select * from alunos where id= ?
        $tipo_servicos = Tipo_servicos::find($id);
        //retornamos a view passando a TUPLA de aluno consultado
        return view('tipo_servicos.edit', ['tipo_servicos' => $tipo_servicos]);

        return redirect('/tipo_servicos')->with('success','Serviço salvo com sucesso');

    }

    public function update(Request $request)
    {
        //find é o método que faz select * from clientes where id= ?
        $tipo_servicos = Tipo_servicos::find($request->id);
        //método update faz um update clientes set nome = ?, idade=? ...
        $tipo_servicos->update([
            'tipo' => $request->tipo,
            'tempo_estimado' => $request->tempo_estimado,
            'custo_medio' => $request->custo_medio
        ]);
        return redirect('/tipo_servicos')->with('success','Serviço editado com sucesso');
    }

    public function destroy($id)
    {
        //select * from aluno where id = ?
        $tipo_servicos = Tipo_servicos::find($id);
        //deleta o aluno no banco
        $tipo_servicos->delete();

        return redirect('/tipo_servicos')->with('success','Serviço excluido com sucesso');
    }
    
}
