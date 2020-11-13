@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Cadastrar Novo Polo</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/polos" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                    <label class="mr-sm-2" for="tipo"><strong>Tipo: </strong></label>
                    <select class="custom-select mr-sm-2" id="tipopolo" name="tipopolo">
                            <option selected disabled>Selecione uma opção</option>
                        @foreach ($tipopolos as $tipopolo)
                            <option value="{{$tipopolo->id}}">{{$tipopolo->descricao}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                    <label class="mr-sm-2" for="tipo"><strong>Parte: </strong></label>
                    <select class="custom-select mr-sm-2" id="parte" name="parte">
                            <option selected disabled>Selecione uma opção</option>
                        @foreach ($partes as $parte)
                            <option value="{{$parte->id}}">{{$parte->descricao}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                    <label class="mr-sm-2" for="cliente"><strong>Cliente: </strong></label>
                    <select class="custom-select mr-sm-2" id="cliente" name="cliente">
                            <option selected disabled>Selecione uma opção</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="processo_id" value="{{$processo->id}}">
            <br><br>
            <input type="submit" class="button btn-success mr-2" value="Gravar">
            <input type="reset" class="button btn-secondary mr-2" value="Limpar">
            <a class="btn btn-dark mr-2" href="{{route('processos.show', $processo->id)}}">Voltar</a>
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
