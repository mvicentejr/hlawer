@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Usuário</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
            <div class="field">
                <strong>ID: </strong> {{$usuario->id}}
            </div>
            <div class="field">
                <strong>Data de Cadastro: </strong> {{date('d/m/Y H:i', strtotime($usuario->datacadastro))}}
            </div>
            <div class="field">
                <strong>Nome: </strong> {{$usuario->nome}}
            </div>
            <div class="field">
                <strong>Email: </strong> {{$usuario->email}}
            </div>
            <br>
            <a class="btn btn-dark" href="{{route('usuarios.index')}}">Voltar</a>
        </div>
    </div>

@endsection
