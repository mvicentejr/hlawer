@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Editar Polo</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('polos.destroy', $polo->id) }}" method="POST">
        @csrf
        @method('DELETE')
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
        <div class="field">
            <h5>Tem certeza da remoção?</h5>
        </div>
        <input type="hidden" name="processo_id" value="{{$polo->processo_id->id}}">
        <br><br>
        <input type="submit" class="button btn-danger mr-2" value="Apagar">
        <a class="btn btn-dark mr-2" href="{{route('processos.show', $polo->processo_id->id)}}">Voltar</a>
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
