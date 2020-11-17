@extends('layout')
@section('content')

<h2 class="text-center">Relatórios de Clientes</h2>
<br><br>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <h5>Relatório Geral de Clientes</h5>
        </div>
        <div class="field">
            <a class="btn btn-primary" href="{{ route('relclientes.geral') }}">Gerar</a>
        </div>
        <br><br>
        <div class="field">
            <h5>Relatório de Clientes por Tipo de Pessoa</h5>
        </div>
        <form class="form" action="/relclientes/tipo" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                        <select class="custom-select mr-sm-2" id="tipocliente" name="tipocliente">
                            <option selected>Escolha o Tipo</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="button btn-primary" value="Gerar">
        </form>
    </div>
</div>


@endsection
