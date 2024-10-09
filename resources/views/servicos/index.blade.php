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

<div class="content-container">
    <div class="card">
        <div class="card-header">
            <h2>Lista de serviços</h2>
        </div>

        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="row">
                <div class="alert alert-success alert-dismissible">
                    <div>{{ $message }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col">
                    <a class="btn btn-success float-end" href="{{ url('/servicos/novo') }}">Cadastrar</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nome</th>
                            <th>Marca/Modelo</th>
                            <th>Placa</th>
                            <th>Defeito</th>
                            <th>Ações</th>
                            <th>Status</th> <!-- Coluna de status -->
                        </tr>
                        @foreach($servicos as $servicos)
                        <tr>
                            <td>{{ $servicos['nome'] }}</td>
                            <td>{{ $servicos['marmod'] }}</td>
                            <td>{{ $servicos['placa'] }}</td>
                            <td>{{ $servicos['defeito'] }}</td>                                                                           
                            <td>
                                <a class="btn btn-primary" href="{{ url('/servicos/editar', ['id' => $servicos['id']]) }}">Editar</a>
                                <a onclick="funConfirma(this)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" href="{{ url('/servicos/delete', ['id' => $servicos['id']]) }}">Finalizar</a>
                            </td>
                            <td>
                            <select class="form-select" id="status-select" onchange="updateSelectColor()">
                                 <option value="Analisando">Analisando</option>
                                 <option value="Em Andamento">Em Andamento</option>
                                 <option value="Concluído">Concluído</option>
                            </select>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>Total de serviços: {{ $total }}</td>
                            <td colspan="3"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="btn btn-secondary float-end" href="{{ url('/dashboard') }}">Voltar</a>
                </div>
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
        Deseja realmente finalizar esse serviço?
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
        <a id="btnConfirma" href="" class="btn btn-primary">Confirmar</a>
      </div>
    </div>
  </div>
</div>

@endsection


<script>
    function funConfirma(elemento) {
        document.getElementById('btnConfirma').setAttribute('href', elemento.href);
    }
</script>
