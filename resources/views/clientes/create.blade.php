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
        <h2>Cadastro de Clientes</h2>
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
            <form action="{{ url('clientes/novo') }}" method="POST">
                @csrf
                <div class="row">
                    <strong>Nome:</strong>
                    <input placeholder="Informe o nome" class="form-control mb-3" name="nome" type="text" />

                    <strong>Email:</strong>
                    <input placeholder="Informe o email" class="form-control mb-3" name="email" type="text" />

                    <strong>Telefone:</strong>
                    <input placeholder="Informe seu telefone" class="form-control mb-3" name="telefone" type="text" />

                    <strong>cpf:</strong>
                    <input placeholder="Informe seu CPF" class="form-control mb-3" name="cpf" type="text" />

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