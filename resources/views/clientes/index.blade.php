@extends('layout')
@section('content')

<h2 class="text-center">Listar Clientes</h2>
<br><br>
<form action="/clientes/create">
    <div class="field">
        <div class="control">
            <button type="submit" class="btn btn-success">Novo Cliente</button>
        </div>
    </div>
</form>
<br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Tipo</th>
        <th>Telefone 1</th>
        <th>Telefone 2</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    @foreach ($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->nome}}</td>
            <td>{{$cliente->tipocliente->descricao}}</td>
            <td>{{$cliente->fone1}}</td>
            <td>{{$cliente->fone2}}</td>
            <td>{{$cliente->email}}</td>
            <td>
                <a class="btn btn-secondary" href="{{ route('clientes.show', $cliente->id) }}">Mostrar</a>
                <a class="btn btn-primary" href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$cliente->id}}">
                    Remover
                </button>
            </td>
        </tr>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$cliente->nome}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('clientes.destroy', $cliente->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <div class="modal-body">
                    <h5 class="text-center">Cliente {{$cliente->id}} - {{$cliente->nome}}</h5>
                    <br>
                    <p class="text-center">
                        Tem certeza da remoção?
                    </p>
                    <input type="hidden" name="funcionario_id" id="cat_id" value="">
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
