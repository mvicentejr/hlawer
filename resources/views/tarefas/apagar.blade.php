@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Apagar Tarefa</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="field">
            <strong>ID: </strong> {{$tarefa->id}}
        </div>
        <div class="field">
            <strong>Advogado: </strong> {{$tarefa->advogado->nome}}
        </div>
        <div class="field">
            <strong>Processo: </strong> {{$tarefa->processo_id->numprocesso}}
        </div>
        <div class="field">
            <strong>Status: </strong> {{$tarefa->statustarefa->descricao}}
        </div>
        <div class="field">
            <strong>Tipo: </strong> {{$tarefa->tipotarefa->descricao}}
        </div>
        <div class="field">
            <strong>Data: </strong> {{date('d/m/Y', strtotime($tarefa->datatarefa))}}
        </div>
        <div class="field">
            <strong>Descrição: </strong> {{$tarefa->descricao}}
        </div>
        <div class="field">
            <strong>Prazo Atual: </strong> {{$tarefa->prazo}} Dias
        </div>
        <br>
        <div class="field">
            <h5>Tem certeza da remoção?</h5>
        </div>
        <br><br>
        <input type="submit" class="button btn-danger mr-2" value="Apagar">
        <a class="btn btn-dark mr-2" href="{{route('tarefas.index')}}">Voltar</a>
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
