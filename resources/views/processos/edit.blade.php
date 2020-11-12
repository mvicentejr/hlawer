@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Editar Processo</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('processos.update', $processo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
            <strong>ID: </strong> {{$processo->id}}
        </div>
        <div class="field">
            <strong>Status: </strong> {{$processo->statusprocesso->descricao}}
            <input type="hidden" name="statusprocesso" value="{{$processo->statusprocesso->id}}">
        </div>
        <div class="field">
            <strong>Foro: </strong>
            <div class="control">
                <input type="text" class="input" name="foro" value="{{$processo->foro}}">
            </div>
        </div>
        <div class="field">
            <strong>Vara: </strong>
            <div class="control">
                <input type="text" class="input" name="vara" value="{{$processo->vara}}">
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Data Início: </strong>
                    <div class="control">
                        <input type="date" class="input" name="datainicio" value="{{$processo->datainicio}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Número do Processo: </strong>
                    <div class="control">
                        <input type="text" class="input" name="numprocesso" value="{{$processo->numprocesso}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-6">
                <label class="mr-sm-2" for="area"><strong>Área: </strong></label>
                <select class="custom-select mr-sm-2" id="area" name="area">
                    <option selected value="{{$processo->area->id}}">{{$processo->area->descricao}}</option>
                    @foreach ($areas as $area)
                        <option value="{{$area->id}}">{{$area->descricao}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Classe: </strong>
            <div class="control">
                <input type="text" class="input" name="classe" value="{{$processo->classe}}">
            </div>
        </div>
        <div class="field">
            <strong>Assunto: </strong>
            <div class="control">
                <input type="text" class="input" name="assunto" value="{{$processo->assunto}}">
            </div>
        </div>
        <div class="field">
            <strong>Parte Contrária: </strong>
            <div class="control">
                <input type="text" class="input" name="parte2" value="{{$processo->parte2}}">
            </div>
        </div>
        <div class="field">
            <strong>Advogado Parte Contrária: </strong>
            <div class="control">
                <input type="text" class="input" name="advparte2" value="{{$processo->advparte2}}">
            </div>
        </div>
        <div class="field">
            <strong>Descrição: </strong>
            <div class="control">
                <input type="text" class="input" name="descricao" value="{{$processo->descricao}}">
            </div>
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
