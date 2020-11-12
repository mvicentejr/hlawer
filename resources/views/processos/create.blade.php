@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Cadastrar Novo Processo</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/processos" method="POST">
        @csrf
            <div class="field">
                <strong>Foro: </strong>
                <div class="control">
                    <input type="text" class="input" name="foro">
                </div>
            </div>
            <div class="field">
                <strong>Vara: </strong>
                <div class="control">
                    <input type="text" class="input" name="vara">
                </div>
            </div>
            <input type="hidden" name="statusprocesso" value="1">
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Data Início: </strong>
                        <div class="control">
                            <input type="date" class="input" name="datainicio">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Número do Processo: </strong>
                        <div class="control">
                            <input type="text" class="input" name="numprocesso">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                    <label class="mr-sm-2" for="area"><strong>Área: </strong></label>
                    <select class="custom-select mr-sm-2" id="area" name="area">
                        <option selected disabled>Selecione uma opção</option>
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
                    <input type="text" class="input" name="classe">
                </div>
            </div>
            <div class="field">
                <strong>Assunto: </strong>
                <div class="control">
                    <input type="text" class="input" name="assunto">
                </div>
            </div>
            <div class="field">
                <strong>Parte Contrária: </strong>
                <div class="control">
                    <input type="text" class="input" name="parte2">
                </div>
            </div>
            <div class="field">
                <strong>Advogado Parte Contrária: </strong>
                <div class="control">
                    <input type="text" class="input" name="advparte2">
                </div>
            </div>
            <div class="field">
                <strong>Descrição: </strong>
                <div class="control">
                    <input type="text" class="input" name="descricao">
                </div>
            </div>
            <br><br>
            <input type="submit" class="button btn-success mr-2" value="Gravar">
            <input type="reset" class="button btn-secondary mr-2" value="Limpar">
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
