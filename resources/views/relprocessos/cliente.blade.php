@extends('layout')
@section('content')

<h2 class="text-center">Relatório Processos - Por Cliente</h2>
<br><br>
<div class="table-responsive">
    <div class="pull-right">
        <strong>Cliente: </strong> {{$cliente->nome}}
    </div>
    <br>
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Data Início</th>
            <th>Número</th>
            <th>Área</th>
            <th>Polo</th>
            <th>Parte</th>
            <th>Status</th>
        </tr>
    @foreach ($polos as $polo)
        <tr>
            <td>{{$polo->processo_id->id}}</td>
            <td>{{date('d/m/Y', strtotime($polo->processo_id->datainicio))}}</td>
            <td>{{$polo->processo_id->numprocesso}}</td>
            <td>{{$polo->processo_id->area->descricao}}</td>
            <td>{{$polo->tipopolo->descricao}}</td>
            <td>{{$polo->parte->descricao}}</td>
            <td>{{$polo->processo_id->statusprocesso->descricao}}</td>
        </tr>
    @endforeach
    </table>
    <br>
    <div class="pull-right">
        <strong>Total de Processos: </strong> {{$total}}
    </div>
</div>

@endsection
