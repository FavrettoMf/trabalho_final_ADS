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
        z-index: -1;
    }

    /* Estilo para centralizar o container da lista de clientes */
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
        <h2>Editar Serviço</h2>
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
            <form action="{{ url('servicos/update', ['id' => $servico->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <select id="clienteSelect" class="form-control mb-3" name="id_cliente" required>
                        <option value="">Selecione um cliente</option>
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $cliente->id == $servico->veiculos->id_cliente ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                        @endforeach
                    </select>

                    <strong>Placa:</strong>
                    <select id="placaSelect" class="form-control mb-3" name="veiculos_id" required>
                        <option value="">Selecione a placa do veículo</option>
                        @foreach($veiculos as $veiculo)
                        <option value="{{ $veiculo->id }}" {{ $veiculo->id == $servico->veiculos_id ? 'selected' : '' }}>{{ $veiculo->placa }}</option>
                        @endforeach
                    </select>

                    <strong>Modelo:</strong>
                    <select id="modeloSelect" class="form-control mb-3" name="veiculos_id" required>
                        <option value="">Selecione o modelo</option>
                        @foreach($veiculos as $veiculo)
                        <option value="{{ $veiculo->id }}" {{ $veiculo->id == $servico->veiculos_id ? 'selected' : '' }}>{{ $veiculo->modelo }}</option>
                        @endforeach
                    </select>

                    <strong>Tipo de Serviço:</strong>
                    <select class="form-control mb-3" name="tipo_servicos_id" required>
                        <option value="">Selecione o tipo de serviço</option>
                        @foreach($tipo_servicos as $tipo_servico)
                        <option value="{{ $tipo_servico->id }}" {{ $tipo_servico->id == $servico->tipo_servicos_id ? 'selected' : '' }}>{{ $tipo_servico->tipo }}</option>
                        @endforeach
                    </select>

                    <strong>Defeito:</strong>
                    <textarea placeholder="Informe o defeito" class="form-control mb-3" name="defeito" required>{{ $servico->defeito }}</textarea>

                    <strong>Status:</strong>
                    <select class="form-control mb-3" name="status" required>
                        <option value="Em análise" {{ $servico->status == 'Em análise' ? 'selected' : '' }}>Em análise</option>
                        <option value="Em andamento" {{ $servico->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                        <option value="Concluído" {{ $servico->status == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                    </select>

                    <div class="col">
                        <a class="btn btn-secondary" href="{{ url('/servicos') }}">Voltar</a>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Atualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script AJAX para carregar veículos com base no cliente selecionado -->
<script>
    document.getElementById('clienteSelect').addEventListener('change', function() {
        const clienteId = this.value;

        fetch(`/clientes/${clienteId}/veiculos`)
            .then(response => response.json())
            .then(data => {
                const placaSelect = document.getElementById('placaSelect');
                const modeloSelect = document.getElementById('modeloSelect');

                // Limpa as opções atuais
                placaSelect.innerHTML = '<option value="">Selecione a placa do veículo</option>';
                modeloSelect.innerHTML = '<option value="">Selecione o modelo</option>';

                // Adiciona novas opções com os dados retornados
                data.forEach(veiculo => {
                    placaSelect.innerHTML += `<option value="${veiculo.id}">${veiculo.placa}</option>`;
                    modeloSelect.innerHTML += `<option value="${veiculo.id}">${veiculo.modelo}</option>`;
                });
            })
            .catch(error => console.error('Erro ao buscar veículos:', error));
    });
</script>

@endsection
