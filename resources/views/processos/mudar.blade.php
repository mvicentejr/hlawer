@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Alterar Status do Processo</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('processos.mudastat', $processo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
            <strong>ID: </strong> {{$processo->id}}
        </div>
        <div class="field">
            <strong> Status Atual: </strong> {{$processo->statusprocesso->descricao}}
        </div>
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-6">
                    <label class="mr-sm-2" for="statusprocesso"><strong>Novo Status: </strong></label>
                        <select class="custom-select mr-sm-2" id="statusprocesso" name="statusprocesso">
                        <option selected value="{{$processo->statusprocesso->id}}"></option>
                            @foreach ($statusprocessos as $statusprocesso)
                                <option value="{{$statusprocesso->id}}">{{$statusprocesso->descricao}}</option>
                            @endforeach
                        </select>
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Foro: </strong> {{$processo->foro}}
        </div>
        <div class="field">
            <strong>Vara: </strong> {{$processo->vara}}
        </div>
        <div class="field">
            <strong>Data Início: </strong> {{date('d/m/Y', strtotime($processo->datainicio))}}
        </div>
        <div class="field">
            <strong>Número do Processo: </strong> {{$processo->numprocesso}}
        </div>
        <div class="field">
            <strong>Área: </strong> {{ $processo->area->descricao}}
        </div>
        <div class="field">
            <strong>Classe: </strong> {{$processo->classe}}
        </div>
        <div class="field">
            <strong>Assunto: </strong> {{$processo->assunto}}
        </div>
        <div class="field">
            <strong>Parte Contrária: </strong> {{$processo->parte2}}
        </div>
        <div class="field">
            <strong>Advogado Parte Contrária: </strong> {{$processo->advparte2}}
        </div>
        <div class="field">
            <strong>Descrição: </strong> {{$processo->descricao}}
        </div>
        <br><br>
        <input type="submit" class="button btn-success mr-2" value="Gravar">
        <a class="btn btn-dark mr-2" href="{{route('processos.index')}}">Voltar</a>
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
