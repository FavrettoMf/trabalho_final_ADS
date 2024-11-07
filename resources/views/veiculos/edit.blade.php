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
        <h2>Editar Veículo</h2>
    </div>
    <div class="card-body">
        <form action="{{ url('/veiculos/editar') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $veiculo->id }}">

            <div class="mb-3">
                <label for="marca" class="form-label"><strong>Marca:</strong></label>
                <input class="form-control" name="marca" type="text" value="{{ $veiculo->Marca }}" required>
            </div>

            <div class="mb-3">
                <label for="placa" class="form-label"><strong>Placa:</strong></label>
                <input class="form-control" name="placa" type="text" value="{{ $veiculo->placa }}" required>
            </div>

            <div class="mb-3">
                <label for="ano" class="form-label"><strong>Ano de Fabricação:</strong></label>
                <input class="form-control" name="ano" type="text" value="{{ $veiculo->ano }}" required>
            </div>

            <div class="mb-3">
                <label for="modelo" class="form-label"><strong>Modelo:</strong></label>
                <input class="form-control" name="modelo" type="text" value="{{ $veiculo->modelo }}" required>
            </div>

            <div class="mb-3">
                <label for="id_cliente" class="form-label"><strong>Cliente:</strong></label>
                <select class="form-control" name="id_cliente" required>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $veiculo->id_cliente == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a class="btn btn-secondary" href="{{ url('/veiculos') }}">Voltar</a>
                <button class="btn btn-primary" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>

@endsection
