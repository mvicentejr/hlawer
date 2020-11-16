@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Editar Evento</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('eventos.update', $evento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
            <strong>ID: </strong> {{$evento->id}}
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Data e Hora: </strong>
                    <div class="control">
                        <input type="datetime-local" class="input" name="dataevento" value="{{date('Y-m-d\TH:i', strtotime($evento->dataevento))}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Descrição: </strong>
            <div class="control">
                <input type="text" class="input" name="descricao" value="{{$evento->descricao}}">
            </div>
        </div>
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-6">
                <label class="mr-sm-2" for="advogado"><strong>Advogado: </strong></label>
                <select class="custom-select mr-sm-2" id="advogado" name="advogado">
                    <option selected value="{{$evento->advogado->id}}">{{$evento->advogado->nome}}</option>
                    @foreach ($advogados as $advogado)
                        <option value="{{$advogado->id}}">{{$advogado->nome}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-6">
                <label class="mr-sm-2" for="statusevento"><strong>Status: </strong></label>
                <select class="custom-select mr-sm-2" id="statusevento" name="statusevento">
                    <option selected value="{{$evento->statusevento->id}}">{{$evento->statusevento->descricao}}</option>
                    @foreach ($statuseventos as $statusevento)
                        <option value="{{$statusevento->id}}">{{$statusevento->descricao}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <br><br>
        <input type="submit" class="button btn-success mr-2" value="Gravar">
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
