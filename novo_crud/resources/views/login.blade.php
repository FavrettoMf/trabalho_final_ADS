@extends('template_crud')
@section('content')
<div class="card-center" style="width: 50rem;">
    <div class="container">
        <div class="card-header text-center">
            <div class="card" style="width: rem;">
                <img src="https://conteudo.imguol.com.br/c/bol/fotos/6f/2018/06/15/sem-foto-de-perfil-1529109983403_615x300.jpg">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center" style="height: rem;">
            <h2>Login</h2>
        </div>
        <div class="card-body" style="width: 50rem;">
            <!-- erros alimentados pelo validate no controller -->
            <div class="row">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <strong>Opa!</strong> Existem alguns problemas com seus dados. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <!-- formulário que dispara POST para rota /login -->
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <strong>Email</strong>
                <input class="form-control mb-3" type="email" name="email" id="email">
                <strong>Senha</strong>
                <input class="form-control mb-3" type="password" name="password" id="password">
                <div class="text-center">
                    <button class="btn btn-primary" type="submit"> Entrar </button>
                </div>
            </form>
        </div>
    </div>
    @endsection