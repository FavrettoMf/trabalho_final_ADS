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
        <h2>Cadastro de Veiculos</h2>
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
           <form action="{{ url('veiculos/novo') }}" method="POST">
              @csrf
                <div class="row">
                    <strong>Marca:</strong>
                    <input placeholder="Informe a marca" class="form-control mb-3" name="marca" type="text" />

                    <strong>Placa:</strong>
                    <input placeholder="Informe a placa" class="form-control mb-3" name="placa" type="text" />

                    <strong>Ano:</strong>
                    <input placeholder="Informe o ano" class="form-control mb-3" name="ano" type="text" />

                    <strong>Modelo:</strong>
                    <input placeholder="Informe o modelo" class="form-control mb-3" name="modelo" type="text" />

                    <strong>Cliente:</strong>
<select class="form-control mb-3" name="id_cliente">
    <option value="">Selecione um cliente</option>
    @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option> <!-- Supondo que a coluna de nome seja 'nome' -->
    @endforeach
</select>


                    <div class="col">
                        <a class="btn btn-secondary" href="{{ url('/veiculos') }}">Voltar</a>
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