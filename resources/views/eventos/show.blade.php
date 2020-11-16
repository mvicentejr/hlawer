@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Evento</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
            <div class="field">
                <strong>ID: </strong> {{$evento->id}}
            </div>
            <div class="field">
                <strong>Data: </strong> {{date('d/m/Y', strtotime($evento->dataevento))}}
            </div>
            <div class="field">
                <strong>Hora: </strong> {{date('H:i', strtotime($evento->dataevento))}}
            </div>
            <div class="field">
                <strong>Descrição: </strong> {{$evento->descricao}}
            </div>
            <div class="field">
                <strong>Advogado: </strong> {{$evento->advogado->nome}}
            </div>
            <div class="field">
                <strong>Status: </strong> {{$evento->statusevento->descricao}}
            </div>
            <br>
            <a class="btn btn-dark" href="{{route('eventos.index')}}">Voltar</a>
        </div>
    </div>

@endsection
