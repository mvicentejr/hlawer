@extends('layout')
@section('content')

<h2 class="text-center">Relatórios de Processos</h2>
<br><br>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <h5>Relatório de Processos por Status</h5>
        </div>
        <form class="form" action="/relprocessos/status" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                        <select class="custom-select mr-sm-2" id="statusprocesso" name="statusprocesso">
                            <option selected>Escolha o Status</option>
                            @foreach ($statusprocessos as $statusprocesso)
                                <option value="{{$statusprocesso->id}}">{{$statusprocesso->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="button btn-primary" value="Gerar">
        </form>
        <br><br>
        <div class="field">
            <h5>Relatório de Processos por Área</h5>
        </div>
        <form class="form" action="/relprocessos/area" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                        <select class="custom-select mr-sm-2" id="area" name="area">
                            <option selected>Escolha a Área</option>
                            @foreach ($areas as $area)
                                <option value="{{$area->id}}">{{$area->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="button btn-primary" value="Gerar">
        </form>
        <br><br>
        <div class="field">
            <h5>Relatório de Processos por Cliente</h5>
        </div>
        <form class="form" action="/relprocessos/cliente" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                        <select class="custom-select mr-sm-2" id="cliente" name="cliente">
                            <option selected>Escolha o Cliente</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
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
