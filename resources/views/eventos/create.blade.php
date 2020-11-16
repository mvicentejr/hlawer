@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Cadastrar Novo Evento</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/eventos" method="POST">
        @csrf
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                    <strong>Data: </strong>
                    <div class="control">
                        <input type="datetime-local" class="input" name="dataevento">
                    </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Descrição: </strong>
                <div class="control">
                    <input type="text" class="input" name="descricao">
                </div>
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                    <label class="mr-sm-2" for="advogado"><strong>Advogado: </strong></label>
                    <select class="custom-select mr-sm-2" id="advogado" name="advogado">
                            <option selected disabled>Selecione uma opção</option>
                        @foreach ($advogados as $advogado)
                            <option value="{{$advogado->id}}">{{$advogado->nome}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="statusevento" value="2">
            <br><br>
            <input type="submit" class="button btn-success mr-2" value="Gravar">
            <input type="reset" class="button btn-secondary mr-2" value="Limpar">
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
