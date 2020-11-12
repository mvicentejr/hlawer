@extends('layout')
@section('content')

<h2 class="text-center">Listar Processos por Status</h2>
<br><br>
<div class="col-12 pb-2">
    <div class="control">
        <a class="btn btn-secondary mr-2" href="{{route('processos.index')}}">Voltar</a>
    </div>
</div>
<div class="table-responsive col-12">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Data Início</th>
        <th>Status</th>
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
            <td>{{$processo->statusprocesso->descricao}}</td>
            <td>{{$processo->numprocesso}}</td>
            <td>{{$processo->area->descricao}}</td>
            <td>{{$processo->classe}}</td>
            <td>{{$processo->assunto}}</td>
            <td>
                <a class="btn btn-info mr-2" href="{{ route('processos.show', $processo->id) }}">Mostrar</a>
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
