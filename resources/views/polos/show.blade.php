@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Polo</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
            <div class="field">
                <strong>ID: </strong> {{$polo->id}}
            </div>
            <div class="field">
                <strong>Tipo: </strong> {{$polo->tipopolo->descricao}}
            </div>
            <div class="field">
                <strong>Parte: </strong> {{$polo->parte->descricao}}
            </div>
            <div class="field">
                <strong>Cliente: </strong> {{$polo->cliente->nome}}
            </div>
            <div class="field">
                <strong>Processo: </strong> {{$polo->processo_id->numprocesso}}
            </div>
            <br>
            <a class="btn btn-dark" href="{{route('processos.show', $polo->processo_id->id)}}">Voltar</a>
        </div>
    </div>

@endsection
