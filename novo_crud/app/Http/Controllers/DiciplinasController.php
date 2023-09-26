<?php

namespace App\Http\Controllers;

use App\Models\Diciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DiciplinasController extends Controller
{
    //
    public function index()
    {
        //usaremos a model para buscar os alunos
        //select * from alunos order by nome asc
        $listaDiciplinas = DB::table('diciplinas')->orderBy('diciplina', 'asc')->get();
        $listaDiciplinas = json_decode($listaDiciplinas, true);

        $total = DB::table('diciplinas')->count();
        //dd($listaAlunos);
        return view('diciplinas.index', ['diciplinas' => $listaDiciplinas, 'total' => $total]);
    }

    public function create()
    {
        //alguma lógica aqui
        return view('diciplinas.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'diciplina' => 'required|min:2|max:50',
            'professor' => 'required|min:2|max:50'
        ]);

        Diciplina::create([
            'diciplina' => $request->diciplina,
            'professor' => $request->professor,
            'aulas' => $request->aulas
        ]);

        return redirect('/diciplinas')->with('success', 'Diciplina salva com sucesso');
    }

    public function edit($id)
    {
        //find é o método que faz select * from alunos where id= ?
        $diciplina = Diciplina::find($id);
        //retornamos a view passando a TUPLA de aluno consultado
        return view('diciplinas.edit', ['diciplina' => $diciplina]);
    }

    public function update(Request $request)
    {
        //find é o método que faz select * from alunos where id= ?
        $diciplina = Diciplina::find($request->id);
        //método update faz um update aluno set nome = ?, idade=? ...
        $diciplina->update([
            'diciplina' => $request->diciplina,
            'professor' => $request->professor,
            'aulas' => $request->aulas
        ]);

        return redirect('/diciplinas')->with('success', 'Diciplina editada com sucesso');
    }

    public function destroy($id)
    {
        //select * from aluno where id = ?
        $diciplina = Diciplina::find($id);
        //deleta o aluno no banco
        $diciplina->delete();
       
        return redirect('/diciplinas')->with('success', 'Diciplina excluida com sucesso');
    }
}
