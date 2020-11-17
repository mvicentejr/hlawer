@extends('layout')
@section('content')

<h2 class="text-center">Relatórios de Eventos</h2>
<br><br>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <h5>Relatório de Eventos por Período</h5>
        </div>
        <form class="form" action="/releventos/periodo" method="POST">
        @csrf
        <div class="field">
            <div class="form-row">
                <div class="col-4">
                    <strong>Data Inicial: </strong>
                    <div class="control">
                        <input type="date" class="input" name="inicio">
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-4">
                    <strong>Data Final: </strong>
                    <div class="control">
                        <input type="date" class="input" name="fim">
                    </div>
                </div>
            </div>
        </div>
            <input type="submit" class="button btn-primary" value="Gerar">
        </form>
        <br><br>
        <div class="field">
            <h5>Relatório de Eventos por Advogado</h5>
        </div>
        <form class="form" action="/releventos/advogado" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                        <select class="custom-select mr-sm-2" id="advogado" name="advogado">
                            <option selected>Escolha o Advogado</option>
                            @foreach ($advogados as $advogado)
                                <option value="{{$advogado->id}}">{{$advogado->nome}}</option>
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
