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
        <h2>Cadastro de Serviços</h2>
    </div>
    <div class="card-body">
        <div class="row">
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <strong>Problemas nos seus dados:</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="row">
            <form action="{{ url('servicos/novo') }}" method="POST">
                @csrf
                <div class="row">
                    <strong>Cliente:</strong>
                    <select class="form-control mb-3" name="id_cliente" id="clienteSelect" required>
                        <option value="">Selecione um cliente</option>
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>

                    <strong>Veículo:</strong>
                    <select class="form-control mb-3" name="veiculos_id" id="veiculoSelect" required>
                        <option value="">Selecione um veículo</option>
                    </select>

                    <strong>Tipo Serviço:</strong>
                    <select class="form-control mb-3" name="tipo_servicos_id" required>
                        <option value="">Selecione um tipo de serviço</option>
                        @foreach($tipo_servicos as $tipo_servico)
                        <option value="{{ $tipo_servico->id }}">{{ $tipo_servico->tipo }}</option>
                        @endforeach
                    </select>

                    <strong>Defeito:</strong>
                    <textarea placeholder="Informe o defeito" class="form-control mb-3" name="defeito" required></textarea>

                    <strong>Status:</strong>
                    <select class="form-control mb-3" name="status" required>
                        <option value="Em análise">Em análise</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Concluído">Concluído</option>
                    </select>

                    <div class="col">
                        <a class="btn btn-secondary" href="{{ url('/dashboard') }}">Voltar</a>
                    </div>

                    <div class="col">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </div>

  
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('clienteSelect').addEventListener('change', function() {
        const clienteId = this.value;

        if (clienteId) {
            fetch(`/api/veiculos/${clienteId}`)
                .then(response => response.json())
                .then(data => {
                    const veiculoSelect = document.getElementById('veiculoSelect');
                    veiculoSelect.innerHTML = '<option value="">Selecione um veículo</option>';

                    // Adiciona novas opções com base nos veículos retornados
                    data.forEach(veiculo => {
                        veiculoSelect.innerHTML += `<option value="${veiculo.id}">${veiculo.placa} - ${veiculo.modelo}</option>`;
                    });
                });
        }
    });
</script>

@endsection
