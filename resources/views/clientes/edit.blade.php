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
        <h2>Editar clientes</h2>
    </div>
    <div class="card-body">
        <div class="row">
        </div>
        <div class="row">
            <form action="{{ url('/clientes/editar') }}" method="POST">
                @csrf
                <div class="row">
                <input type="hidden" name="id" value="{{ $clientes['id'] }}">

                    <strong>Nome:</strong>
                    <input class="form-control mb-3" name="nome" type="text" value="{{ $clientes['nome'] }}" /><br>

                    <strong>Email:</strong>
                    <input class="form-control mb-3" name="email" type="text" value="{{ $clientes['email'] }}" /><br>

                    <strong>Telefone:</strong>
                    <input class="form-control mb-3" name="telefone" type="text" value="{{ $clientes['telefone'] }}" /><br>

                    <strong>CPF:</strong>
                    <input class="form-control mb-3" name="cpf" type="text" value="{{ $clientes['cpf'] }}" /><br>

                    <div class="col">
                        <a class="btn btn-secondary" href="{{ url('/clientes') }}">Voltar</a>
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