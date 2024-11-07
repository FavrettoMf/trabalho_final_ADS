@extends('template_crud')
@section('content')
<style>
     body {
            background-color: #f4f7fa;
            color: #333;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(37%);
            /* Deixa a imagem um pouco mais apagada */
            z-index: -2;
            /* Garante que a imagem esteja atrás da sobreposição e do conteúdo */
        }
    /* Estilo para garantir que a imagem ocupe toda a tela */
    .background-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1; /* Garante que a imagem esteja atrás do conteúdo */
    }

    /* Estilo para centralizar o container da lista de clientes */
    .content-container {
    position: relative;
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.8); /* Branco com menor opacidade */
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Sombra suave para destacar */
}

</style>

<!-- Imagem de fundo -->
<img src="https://blog.simplusbr.com/wp-content/uploads/2020/09/oficina-mecanica-organizada.jpg" alt="Imagem de Fundo" class="background-image">
<div class="background-overlay"></div>

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
