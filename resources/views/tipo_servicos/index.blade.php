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
            <h2>Lista de serviços oferecidos</h2>
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
                    <a class="btn btn-success float-end" href="{{ url('/tipo_servicos/novo') }}">Cadastrar</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <tr>
                            <th>Tipo</th>
                            <th>Tempo estimado</th>
                            <th>Custo Medio</th>
                        </tr>
                        @foreach($tipo_servicos as $tipo_servicos)
                        <tr>
                        <td>{{ $tipo_servicos['tipo'] }}</td>
                        <td>{{ number_format($tipo_servicos['tempo_estimado'] ) }} horas</td>
                        <td>R$ {{ number_format($tipo_servicos['custo_medio'], 2, ',', '.') }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('/tipo_servicos/editar', ['id' => $tipo_servicos['id']]) }}">Editar</a>
                                <a onclick="funConfirma(this)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" href="{{ url('/tipo_servicos/delete', ['id' => $tipo_servicos['id']]) }}">Excluir</a>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>Total de serviços oferecidos: {{ $total }}</td>
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
        Deseja realmente excluir esse serviço?
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