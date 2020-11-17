@extends('layout')
@section('content')

<h2 class="text-center">Relatório Geral de Advogados</h2>
<br><br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Cadastro</th>
            <th>Nome</th>
            <th>Área</th>
            <th>OAB</th>
        </tr>
    @foreach ($advogados as $advogado)
        <tr>
            <td>{{$advogado->id}}</td>
            <td>{{date('d/m/Y', strtotime($advogado->datacadastro))}}</td>
            <td>{{$advogado->nome}}</td>
            <td>{{$advogado->area->descricao}}</td>
            <td>{{$advogado->oab}}</td>
        </tr>
    @endforeach
    </table>
    <br>
    <div class="pull-right">
        <strong>Total de Advogados: </strong> {{$total}}
    </div>
</div>

@endsection
