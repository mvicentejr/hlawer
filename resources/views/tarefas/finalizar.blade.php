@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Finalizar Tarefa</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('tarefas.mudastatus', $tarefa->id) }}" method="POST">
        @csrf
        @method('PUT')
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
            <h5>Deseja finalizar a tarefa?</h5>
        </div>
        <br><br>
        <input type="submit" class="button btn-success mr-2" value="Finalizar">
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
