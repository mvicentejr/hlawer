@extends('layout')
@section('content')

<h2 class="text-center">Relatório Tarefas - Por Status</h2>
<br><br>
<div class="table-responsive">
    <div class="pull-right">
        <strong>Status: </strong> {{$status->descricao}}
    </div>
    <br>
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Advogado</th>
            <th>Processo</th>
            <th>Tipo</th>
            <th>Data</th>
            <th>Descrição</th>
        </tr>
    @foreach ($tarefas as $tarefa)
        <tr>
            <td>{{$tarefa->id}}</td>
            <td>{{$tarefa->advogado->nome}}</td>
            <td>{{$tarefa->processo_id->numprocesso}}</td>
            <td>{{$tarefa->tipotarefa->descricao}}</td>
            <td>{{date('d/m/Y', strtotime($tarefa->datatarefa))}}</td>
            <td>{{$tarefa->descricao}}</td>
        </tr>
    @endforeach
    </table>
    <br>
    <div class="pull-right">
        <strong>Total de Tarefas: </strong> {{$total}}
    </div>
</div>

@endsection
