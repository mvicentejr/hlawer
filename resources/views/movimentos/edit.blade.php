@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Editar Movimentação</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('movimentos.update', $movimento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
            <strong>ID: </strong> {{$movimento->id}}
        </div>
        <input type="hidden" name="processo_id" value="{{$movimento->processo_id->id}}">
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-6">
                <label class="mr-sm-2" for="tipomov"><strong>Tipo: </strong></label>
                <select class="custom-select mr-sm-2" id="tipomov" name="tipomov">
                    <option selected value="{{$movimento->tipomov->id}}">{{$movimento->tipomov->descricao}}</option>
                    @foreach ($tipomovs as $tipomov)
                        <option value="{{$tipomov->id}}">{{$tipomov->descricao}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Data: </strong>
                    <div class="control">
                        <input type="date" class="input" name="datamov" value="{{$movimento->datamov}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Descrição: </strong>
            <div class="control">
                <input type="text" class="input" name="descricao" value="{{$movimento->descricao}}">
            </div>
        </div>
        <br><br>
        <input type="submit" class="button btn-success mr-2" value="Gravar">
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
