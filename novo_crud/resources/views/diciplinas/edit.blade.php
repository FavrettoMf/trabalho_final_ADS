@extends('template_crud')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Editar diciplinas</h2>
    </div>
    <div class="card-body">
        <div class="row">
        </div>
        <div class="row">
            <form action="{{ url('/diciplinas/editar') }}" method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" name="id" value="{{ $diciplina['id'] }}">

                    <strong>Diciplina:</strong>
                    <input class="form-control mb-3" name="diciplina" type="text" value="{{ $diciplina['diciplina'] }}" /><br>

                    <strong>Professor:</strong>
                    <input class="form-control mb-3" name="professor" type="text" value="{{ $diciplina['professor'] }}" /><br>

                    <strong>Numero de Aulas:</strong>
                    <input class="form-control mb-3" name="aulas" type="number" value="{{ $diciplina['aulas'] }}" /><br>

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