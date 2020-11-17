@extends('layout')
@section('content')

<h2 class="text-center">Relatório Processos - Por Área</h2>
<br><br>
<div class="table-responsive">
    <div class="pull-right">
        <strong>Área: </strong> {{$area->descricao}}
    </div>
    <br>
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Foro</th>
            <th>Vara</th>
            <th>Data Início</th>
            <th>Número</th>
            <th>Classe</th>
            <th>Assunto</th>
            <th>Status</th>
        </tr>
    @foreach ($processos as $processo)
        <tr>
            <td>{{$processo->id}}</td>
            <td>{{$processo->foro}}</td>
            <td>{{$processo->vara}}</td>
            <td>{{date('d/m/Y', strtotime($processo->datainicio))}}</td>
            <td>{{$processo->numprocesso}}</td>
            <td>{{$processo->classe}}</td>
            <td>{{$processo->assunto}}</td>
            <td>{{$processo->statusprocesso->descricao}}</td>
        </tr>
    @endforeach
    </table>
    <br>
    <div class="pull-right">
        <strong>Total de Processos: </strong> {{$total}}
    </div>
</div>

@endsection
