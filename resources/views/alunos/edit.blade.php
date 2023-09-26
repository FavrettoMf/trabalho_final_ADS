@extends('template_crud')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Editar Alunos</h2>
    </div>
    <div class="card-body">
        <div class="row">
        </div>
        <div class="row">
            <form action="{{ url('/alunos/editar') }}" method="POST">
                @csrf
                <div class="row">
                <input type="hidden" name="id" value="{{ $aluno['id'] }}">

                    <strong>Nome:</strong>
                    <input class="form-control mb-3" name="nome" type="text" value="{{ $aluno['nome'] }}" /><br>

                    <strong>Idade:</strong>
                    <input class="form-control mb-3" name="idade" type="text" value="{{ $aluno['idade'] }}" /><br>

                    <strong>Email:</strong>
                    <input class="form-control mb-3" name="email" type="text" value="{{ $aluno['email'] }}" /><br>

                    <div class="col">
                        <a class="btn btn-secondary" href="{{ url('/alunos') }}">Voltar</a>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


@endsection