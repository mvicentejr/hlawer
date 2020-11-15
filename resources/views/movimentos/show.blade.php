@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Movimentação</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
            <div class="field">
                <strong>ID: </strong> {{$movimento->id}}
            </div>
            <div class="field">
                <strong>Processo: </strong> {{$movimento->processo_id->numprocesso}}
            </div>
            <div class="field">
                <strong>Tipo: </strong> {{$movimento->tipomov->descricao}}
            </div>
            <div class="field">
                <strong>Data: </strong> {{date('d/m/Y', strtotime($movimento->datamov))}}
            </div>
            <div class="field">
                <strong>Descrição: </strong> {{$movimento->descricao}}
            </div>

            <br>
            <a class="btn btn-dark" href="{{route('processos.show', $movimento->processo_id->id)}}">Voltar</a>
        </div>
    </div>

@endsection
