@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Apagar Evento</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
        @csrf
        @method('DELETE')
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
        <div class="field">
            <h5>Tem certeza da remoção?</h5>
        </div>
        <br><br>
        <input type="submit" class="button btn-danger mr-2" value="Apagar">
        <a class="btn btn-dark mr-2" href="{{route('eventos.index')}}">Voltar</a>
    </form>
    </div>
</div>

    <br><br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opa!!!</strong>Existem erros na entrada de dados. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

@endsection
