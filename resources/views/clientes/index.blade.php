@extends('template_crud')
@section('content')

<style>
    html, body {
    height: auto; /* Permite que a altura se ajuste ao conteúdo */
    margin: 0; /* Remove margens padrão do body */
}

body {
    background-color: #f4f7fa; /* Fundo padrão, caso a imagem não carregue */
    color: #333;
    font-family: Arial, sans-serif;
}

.background-image {
    position: fixed; /* Mantém a imagem de fundo fixa ao rolar */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%; /* Ocupar 100% da altura da tela */
    object-fit: cover;
    filter: brightness(37%);
    z-index: -2; /* Mantém a imagem atrás do conteúdo */
}

.content-container {
    position: relative;
    max-width: 1200px;
    margin: 0 auto; /* Remove margem superior para evitar espaço branco */
    padding: 20px;
    background: rgba(255, 255, 255, 0.8); /* Fundo semi-transparente */
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin-top: 50px; /* Adiciona espaço superior para que o conteúdo não fique grudado no topo */
}

</style>

<!-- Imagem de fundo -->
<img src="https://blog.simplusbr.com/wp-content/uploads/2020/09/oficina-mecanica-organizada.jpg" alt="Imagem de Fundo" class="background-image">
<div class="background-overlay"></div>

<div class="content-container">
    <div class="card">
        <div class="card-header">
            <h2>Lista de Clientes</h2>
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
                    <a class="btn btn-success float-end" href="{{ url('/clientes/novo') }}">Cadastrar</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Cpf</th>
                            <th>Ações</th>
                        </tr>
                        @foreach($clientes as $clientes)
                        <tr>
                            <td>{{ $clientes['nome'] }}</td>
                            <td>{{ $clientes['email'] }}</td>
                            <td>{{ $clientes['telefone'] }}</td>
                            <td>{{ $clientes['cpf'] }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('/clientes/editar', ['id' => $clientes['id']]) }}">Editar</a>
                                <a onclick="funConfirma(this)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" href="{{ url('/clientes/delete', ['id' => $clientes['id']]) }}">Excluir</a>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>Total de clientes: {{ $total }}</td>
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
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-danger text-white">
        <h2 class="modal-title fs-4" id="exampleModalLabel">
          Confirmação de Exclusão
        </h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-3">
          <strong>Atenção:</strong> Ao excluir este cliente, todos os veículos vinculados a ele também serão permanentemente removidos.
        </p>
        <p>Deseja realmente prosseguir com a exclusão?</p>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancelar</button>
        <a id="btnConfirma" class="btn btn-danger" class="btn btn-primary">Confirmar</a>
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
