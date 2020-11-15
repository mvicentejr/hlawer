@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Tarefa</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
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
            <a class="btn btn-dark" href="{{route('tarefas.index')}}">Voltar</a>
        </div>
    </div>

@endsection
