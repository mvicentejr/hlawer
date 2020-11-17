@extends('layout')
@section('content')

<h2 class="text-center">Relatório Eventos - Por Advogado</h2>
<br><br>
<div class="table-responsive">
    <div class="pull-right">
        <strong>Advogado: </strong> {{$advogado->nome}}
    </div>
    <br>
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Data Evento</th>
            <th>Descrição</th>
            <th>Status</th>
        </tr>
        @foreach ($eventos as $evento)
        <tr>
            <td>{{$evento->id}}</td>
            <td>{{date('d/m/Y', strtotime($evento->dataevento))}}</td>
            <td>{{$evento->descricao}}</td>
            <td>{{$evento->statusevento->descricao}}</td>
        </tr>
    @endforeach
    </table>
    <br>
    <div class="pull-right">
        <strong>Total de Eventos: </strong> {{$total}}
    </div>
</div>

@endsection
