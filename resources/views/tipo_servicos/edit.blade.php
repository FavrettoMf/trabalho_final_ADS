@extends('template_crud')
@section('content')

<style>
    .background-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
    }

    .content-container {
        position: relative;
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 8px;
    }
</style>

<!-- Imagem de fundo -->
<img src="https://blog.simplusbr.com/wp-content/uploads/2020/09/oficina-mecanica-organizada.jpg" alt="Imagem de Fundo" class="background-image">

<div class="card">
    <div class="card-header">
        <h2>Editar serviços</h2>
    </div>
    <div class="card-body">
        <form action="{{ url('/tipo_servicos/editar') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $tipo_servicos->id }}">

            <div class="mb-3">
                <label for="tipo" class="form-label"><strong>Tipo:</strong></label>
                <input class="form-control" name="tipo" type="text" value="{{ $tipo_servicos->tipo }}" required>
            </div>

            <div class="mb-3">
                <label for="tempo_estimado" class="form-label"><strong>Tempo estimado:</strong></label>
                <input class="form-control" name="tempo_estimado" type="text" value="{{ $tipo_servicos->tempo_estimado }}" required>
            </div>

            <div class="mb-3">
                <label for="custo_medio" class="form-label"><strong>Custo médio:</strong></label>
                <input class="form-control" name="custo_medio" type="text" value="{{ $tipo_servicos->custo_medio }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <a class="btn btn-secondary" href="{{ url('/tipo_servicos') }}">Voltar</a>
                <button class="btn btn-primary" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>

@endsection
