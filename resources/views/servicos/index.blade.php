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
        /* Garante que a imagem esteja atrás do conteúdo */
    }

    /* Estilo para centralizar o container da lista de serviços */
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
                                <td>{{ $servicos->veiculos['id_cliente'] }}</td>
                            
                                <td>{{ $servicos->veiculos['placa'] }}</td>
                                <td>{{ $servicos->veiculos['modelo'] }}</td>
                                <td>{{ $servicos->tipo_servicos['tipo'] }}</td>
                                <td>{{ $servicos->tipo_servicos['tempo_estimado'] }} Horas</td>
                                <td>R$ {{ number_format($servicos->tipo_servicos['custo_medio'], 2, ',', '.') }}</td>
                                <td>{{ $servicos['defeito'] }}</td>
                                <td>{{ $servicos['status'] }}</td>
                                <td>
                                <a class="btn btn-primary" href="{{ url('/servicos/editar', ['id' => $servicos['id']]) }}">Editar</a>
                                <a onclick="funConfirma(this)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" href="{{ url('/servicos/delete', ['id' => $servicos['id']]) }}">Excluir</a>
                                   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="btn btn-secondary float-end" href="{{ url('/dashboardGer') }}">Voltar</a>
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
