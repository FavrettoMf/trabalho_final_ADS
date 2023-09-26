@extends('template_crud')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Cadastro de diciplinas</h2>
    </div>
    <div class="card-body">
        <div class="row">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <strong>Problemas nos seus dados</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </div>
            @endif
        </div>
        <div class="row">
            <form action="{{ url('diciplinas/novo') }}" method="POST">
                @csrf
                <div class="row">
                    <strong>Diciplina:</strong>
                    <input placeholder="Informe a diciplina" class="form-control mb-3" name="diciplina" type="text" />

                    <strong>Professor:</strong>
                    <input placeholder="Informe o professor" class="form-control mb-3" name="professor" type="text" />

                    <strong>Numero de Aulas:</strong>
                    <input placeholder="Informe o numero de aulas" class="form-control mb-3" name="aulas" type="number" />

                    <div class="col">
                        <a class="btn btn-secondary" href="{{ url('/diciplinas') }}">Voltar</a>
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


