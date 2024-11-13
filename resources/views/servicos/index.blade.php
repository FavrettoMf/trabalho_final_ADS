@extends('template_crud')
@section('content')

<style>
    html,
    body {
        height: auto;
        /* Permite que a altura se ajuste ao conteúdo */
        margin: 0;
        /* Remove margens padrão do body */
    }

    body {
        background-color: #f4f7fa;
        /* Fundo padrão, caso a imagem não carregue */
        color: #333;
        font-family: Arial, sans-serif;
    }

    .background-image {
        position: fixed;
        /* Mantém a imagem de fundo fixa ao rolar */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* Ocupar 100% da altura da tela */
        object-fit: cover;
        filter: brightness(37%);
        z-index: -2;
        /* Mantém a imagem atrás do conteúdo */
    }

    .content-container {
        position: relative;
        max-width: 1600px;
        margin: 0 auto;
        /* Remove margem superior para evitar espaço branco */
        padding: 20px;
        background: rgba(255, 255, 255, 0.8);
        /* Fundo semi-transparente */
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
        /* Adiciona espaço superior para que o conteúdo não fique grudado no topo */
    }

    .table .col-defeito {
        max-width: 200px;
        /* Ajuste a largura conforme necessário */
        word-wrap: break-word;
        /* Quebra a palavra se ela ultrapassar a largura */
        white-space: pre-wrap;
        /* Mantém as quebras de linha do texto */
    }

    .table .action-buttons {
        display: flex;
        /* Usando flexbox para alinhar os botões horizontalmente */
        justify-content: space-between;
        /* Espaçamento uniforme entre os botões */
        width: 100px;
        /* Defina uma largura fixa */
    }

    .table .action-buttons a {
        font-size: 0.8em;
        /* Reduz o tamanho da fonte */
        margin: 0;
        /* Remove margens */
        padding: 5px 10px;
        /* Ajuste o padding para botões menores */
    }

    .dropdown .btn {
    padding: 5px;
    font-size: 1.2em; /* Tamanho dos pontinhos */
}
</style>

<!-- Imagem de fundo -->
<img src="https://blog.simplusbr.com/wp-content/uploads/2020/09/oficina-mecanica-organizada.jpg" alt="Imagem de Fundo" class="background-image">
<div class="background-overlay"></div>

<div class="content-container">



    <div class="card">
        <div class="card-header">
            <h2>Lista de Serviços</h2>
        </div>

        <div class="card-body">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <div>{{ $message }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="row">
                <div class="col">
                    <a class="btn btn-success float-end" href="{{ url('/servicos/novo') }}">Cadastrar Novo Serviço</a>
                </div>
            </div>

            <div class="row mb-3">
    <div class="col-md-8">
        <form action="{{ url('/servicos') }}" method="GET" class="d-flex align-items-center justify-content-between">
            <!-- Filtro de Status -->
            <div class="d-flex align-items-center me-3">
                <label for="status" class="form-label me-2">Status:</label>
                <select name="status" id="status" class="form-select w-auto">
                    <option value="">Todos os Status</option>
                    <option value="Em analise" {{ request('status') == 'Em analise' ? 'selected' : '' }}>Em Análise</option>
                    <option value="Em Andamento" {{ request('status') == 'Em Andamento' ? 'selected' : '' }}>Em Andamento</option>
                    <option value="Concluído" {{ request('status') == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                </select>
            </div>
            
            <!-- Filtro de Nome do Cliente -->
            <div class="d-flex align-items-center me-3">
                <label for="cliente" class="form-label me-2">Cliente:</label>
                <input type="text" name="cliente" id="cliente" class="form-control w-auto" placeholder="Nome do Cliente" value="{{ request('cliente') }}">
            </div>

            <!-- Botões -->
            <div class="d-flex align-items-center">
    <button type="submit" class="btn btn-primary me-2">Filtrar</button>
    <a href="{{ url('/servicos') }}" class="btn btn-warning d-inline-block">Limpar Filtros</a>
</div>

        </form>
    </div>
</div>

            <div class="col">
    <h5>Total de lucro: <span class="badge bg-primary">R$ {{ number_format($totalCusto, 2, ',', '.') }}</span></h5>
</div>




            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Placa</th>
                                <th>Modelo</th>
                                <th>Tipo de Serviço</th>
                                <th>Tempo Estimado</th>
                                <th>Custo Médio</th>
                                <th>Defeito</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servicos as $servicos)
                            <tr>
                                <td>{{ $servicos->veiculos->clientes->nome ?? 'Cliente não encontrado' }}</td>
                                <td>{{ $servicos->veiculos['placa'] }}</td>
                                <td>{{ $servicos->veiculos['modelo'] }}</td>
                                <td>{{ $servicos->tipo_servicos['tipo'] }}</td>
                                <td>{{ $servicos->tipo_servicos['tempo_estimado'] }} Horas</td>
                                <td>R$ {{ number_format($servicos->tipo_servicos['custo_medio'], 2, ',', '.') }}</td>
                                <td class="col-defeito">{!! nl2br(e($servicos['defeito'])) !!}</td>
                                <td>{{ $servicos['status'] }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            ⋮
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="{{ url('/servicos/editar', ['id' => $servicos['id']]) }}">Editar</a></li>
                                            <li><a class="dropdown-item" onclick="funConfirma(this)" data-bs-toggle="modal" data-bs-target="#exampleModal" href="{{ url('/servicos/delete', ['id' => $servicos['id']]) }}">Excluir</a></li>
                                            <li><a class="dropdown-item" href="{{ route('servicos.gerar-pdf', ['id' => $servicos->id]) }}">Gerar PDF</a></li>
                                        </ul>
                                    </div>
                                </td>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="btn btn-secondary float-end" href="{{ url('/dashboard') }}">Voltar</a>
                </div>
            </div>
            <div class="col">
                <h5>Serviços Concluídos: <span class="badge bg-success">{{ $countConcluido }}</span></h5>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente finalizar esse serviço?</p>
                <div class="mb-3">
                    <label for="funcionario" class="form-label"><strong>Nome do Funcionário:</strong></label>
                    <input type="text" class="form-control" id="funcionario" name="funcionario" placeholder="Nome do funcionário que finalizou" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label"><strong>Descrição:</strong></label>
                    <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição da finalização do serviço" rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" id="btnConfirma" class="btn btn-primary" onclick="submitFinalization()">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function submitFinalization() {
        const funcionario = document.getElementById('funcionario').value.trim();
        const descricao = document.getElementById('descricao').value.trim();

        // Validar se os campos estão preenchidos
        if (!funcionario) {
            alert('Por favor, insira o nome do funcionário que finalizou o serviço.');
            return;
        }

        if (!descricao) {
            alert('Por favor, insira uma descrição para a finalização do serviço.');
            return;
        }

        // Defina o destino da URL com os parâmetros corretos
        const confirmButton = document.getElementById('btnConfirma');
        const baseHref = confirmButton.getAttribute('data-href');
        const url = `${baseHref}?funcionario=${encodeURIComponent(funcionario)}&descricao=${encodeURIComponent(descricao)}`;

        // Redirecionar para a URL com os dados preenchidos
        window.location.href = url;
    }

    // Função para setar a URL base no botão de confirmação ao abrir o modal
    function funConfirma(elemento) {
        const confirmButton = document.getElementById('btnConfirma');
        confirmButton.setAttribute('data-href', elemento.href);
    }
</script>

@endsection