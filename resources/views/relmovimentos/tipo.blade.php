@extends('layout')
@section('content')

<h2 class="text-center">Relatório Movimentações - Por Tipo</h2>
<br><br>
<div class="table-responsive">
    <div class="pull-right">
        <strong>Tipo: </strong> {{$tipomov->descricao}}
    </div>
    <br>
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Processo</th>
            <th>Área</th>
            <th>Data</th>
            <th>Descrição</th>
        </tr>
    @foreach ($movimentos as $movimento)
        <tr>
            <td>{{$movimento->id}}</td>
            <td>{{$movimento->processo_id->numprocesso}}</td>
            <td>{{$movimento->processo_id->area->descricao}}</td>
            <td>{{date('d/m/Y', strtotime($movimento->datamov))}}</td>
            <td>{{$movimento->descricao}}</td>
        </tr>
    @endforeach
    </table>
    <br>
    <div class="pull-right">
        <strong>Total de Movimentações: </strong> {{$total}}
    </div>
</div>

@endsection
