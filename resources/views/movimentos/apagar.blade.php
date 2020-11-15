@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Apagar Movimentação</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('movimentos.destroy', $movimento->id) }}" method="POST">
        @csrf
        @method('DELETE')
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
        <div class="field">
            <h5>Tem certeza da remoção?</h5>
        </div>
        <br><br>
        <input type="submit" class="button btn-danger mr-2" value="Apagar">
        <a class="btn btn-dark mr-2" href="{{route('processos.show', $movimento->processo_id->id)}}">Voltar</a>
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
