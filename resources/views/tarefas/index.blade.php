@extends('layout')
@section('content')

<h2 class="text-center">Listar Tarefas</h2>
<br><br>
<div class="col-12 pb-2">
    <div class="control">
        <a class="btn btn-success" href="{{ route('tarefas.create') }}">Nova Tarefa</a>
    </div>
</div>
<div class="table-responsive col-12">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Advogado</th>
        <th>Status</th>
        <th>Tipo</th>
        <th>Data</th>
        <th>Descrição</th>
        <th>Prazo</th>
        <th>Ações</th>
    </tr>
    @foreach ($tarefas as $tarefa)
        <tr>
            <td>{{$tarefa->id}}</td>
            <td>{{$tarefa->advogado->nome}}</td>
            <td>{{$tarefa->statustarefa->descricao}}</td>
            <td>{{$tarefa->tipotarefa->descricao}}</td>
            <td>{{date('d/m/Y', strtotime($tarefa->datatarefa))}}</td>
            <td>{{$tarefa->descricao}}</td>
            <td>{{$tarefa->prazo}} Dias</td>
            <td>
                <a class="btn btn-info mr-2" href="{{ route('tarefas.show', $tarefa->id) }}">Mostrar</a>
                <a class="btn btn-warning text-white mr-2" href="{{ route('tarefas.edit', $tarefa->id) }}">Editar</a>
                <a class="btn btn-danger mr-2" href="{{ route('tarefas.apagar', $tarefa->id) }}">Apagar</a>
                <a class="btn btn-secondary mr-2" href="{{ route('tarefas.finalizar', $tarefa->id) }}">Finalizar</a>
            </td>
        </tr>
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

