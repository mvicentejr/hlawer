@extends('layout')
@section('content')

<h2 class="text-center">Listar Usuários</h2>
<br><br>
<div class="col-12 pb-2">
    <div class="control">
        <a class="btn btn-success" href="{{ route('usuarios.create') }}">Novo Usuário</a>
    </div>
</div>
<div class="table-responsive col-12">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Data de Cadastro</th>
        <th>Ações</th>
    </tr>
    @foreach ($usuarios as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->nome}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{date('d/m/Y', strtotime($usuario->datacadastro))}}</td>
            <td>
                <a class="btn btn-info mr-2" href="{{ route('usuarios.show', $usuario->id) }}">Mostrar</a>
                <a class="btn btn-warning text-white mr-2" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#exampleModal{{$usuario->id}}">
                    Apagar
                </button>
            </td>
        </tr>

         <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$usuario->nome}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('usuarios.destroy', $usuario->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <div class="modal-body">
                            <h5 class="text-center">Usuário {{$usuario->id}} - {{$usuario->nome}}</h5>
                            <br>
                            <p class="text-center">
                                Tem certeza da remoção?
                            </p>
                            <input type="hidden" name="usuario_id" id="cat_id" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não, Cancelar</button>
                            <button type="submit" class="btn btn-danger">Sim, Remover</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    @endforeach
    </table>
</div>
<br><br>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

@endsection
