@extends('template_crud')
@section('content')

<style>
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
        margin: 50px auto; /* Ajuste a margem superior conforme necessário */
        padding: 20px;
        background: rgba(255, 255, 255, 0.9); /* Fundo semi-transparente para contraste */
        border-radius: 8px;
    }
</style>

<!-- Imagem de fundo -->
<img src="https://blog.simplusbr.com/wp-content/uploads/2020/09/oficina-mecanica-organizada.jpg" alt="Imagem de Fundo" class="background-image">

<div class="card">
    <div class="card-header">
        <h2>Editar servicos</h2>
    </div>
    <div class="card-body">
        <div class="row">
        </div>
        <div class="row">
            <form action="{{ url('/servicos/editar') }}" method="POST">
                @csrf
                <div class="row">
                <input type="hidden" name="id" value="{{ $servicos['id'] }}">

                    <strong>Nome:</strong>
                    <input class="form-control mb-3" name="nome" type="text" value="{{ $servicos['nome'] }}" /><br>

                    <strong>Marca/Modelo:</strong>
                    <input class="form-control mb-3" name="marmod" type="text" value="{{ $servicos['marmod'] }}" /><br>

                    <strong>Placa:</strong>
                    <input class="form-control mb-3" name="placa" type="text" value="{{ $servicos['placa'] }}" /><br>

                    <strong>Defeito:</strong>
                    <input class="form-control mb-3" name="defeito" type="text" value="{{ $servicos['defeito'] }}" /><br>


                    <div class="col">
                        <a class="btn btn-secondary" href="{{ url('/servicos') }}">Voltar</a>
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