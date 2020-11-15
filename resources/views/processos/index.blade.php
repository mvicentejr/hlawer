@extends('layout')
@section('content')

<h2 class="text-center">Listar Processos</h2>
<br><br>
<div class="col-12 pb-2">
    <div class="form-row">
        <div class="col-9">
            <a class="btn btn-success" href="{{ route('processos.create') }}">Novo Processo</a>
        </div>
        <div class="col">
            <a class="button is-success mr-2" href="{{ route('processos.getstatus', 3) }}">Vencidos</a>
            <a class="button is-link mr-2" href="{{ route('processos.getstatus', 4) }}">Perdidos</a>
            <a class="button is-dark mr-2" href="{{ route('processos.getstatus', 2) }}">Inativos</a>
        </div>
    </div>
</div>
<div class="table-responsive col-12">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Data Início</th>
        <th>Número do Processo</th>
        <th>Área</th>
        <th>Classe</th>
        <th>Assunto</th>
        <th>Ações</th>
    </tr>
    @foreach ($processos as $processo)
        <tr>
            <td>{{$processo->id}}</td>
            <td>{{date('d/m/Y', strtotime($processo->datainicio))}}</td>
            <td>{{$processo->numprocesso}}</td>
            <td>{{$processo->area->descricao}}</td>
            <td>{{$processo->classe}}</td>
            <td>{{$processo->assunto}}</td>
            <td>
                <a class="btn btn-info mr-2" href="{{ route('processos.show', $processo->id) }}">Mostrar</a>
                <a class="btn btn-warning text-white mr-2" href="{{ route('processos.edit', $processo->id) }}">Editar</a>
                <a class="btn btn-danger mr-2" href="{{ route('processos.mudar', $processo->id) }}">Status</a>
            </td>
        </tr>

    @endforeach
    </table>
</div>
<div class="col-12 pb-2">
    <div class="control">
        <a class="btn btn-secondary mr-2" href="{{ route('tarefas.index') }}">Tarefas</a>
    </div>
</div>
<br><br>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

@endsection
