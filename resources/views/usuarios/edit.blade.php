@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Editar Usuário</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
            <strong>ID: </strong> {{$usuario->id}}
        </div>
        <div class="field">
            <strong>Data de Cadastro: </strong> {{date('d/m/Y H:i', strtotime($usuario->datacadastro))}}
        </div>
        <div class="field">
            <strong>Nome: </strong>
            <div class="control">
                <input type="text" class="input" name="nome" value="{{$usuario->nome}}">
            </div>
        </div>
        <div class="field">
            <strong>Email: </strong>
            <div class="control">
                <input type="email" class="input" name="email" value="{{$usuario->email}}">
            </div>
        </div>
        <div class="field">
            <strong>Senha: </strong>
            <div class="control">
                <input type="password" class="input" name="password" value="{{$usuario->password}}">
            </div>
        </div>
        <br><br>
        <input type="submit" class="button btn-success mr-2" value="Gravar">
        <a class="btn btn-dark mr-2" href="{{route('usuarios.index')}}">Voltar</a>
    </form>
    </div>
</div>

    <br><br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opa!!!</strong>Existem erros na entrada de dados. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

@endsection
