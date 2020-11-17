@extends('layout')
@section('content')

<h2 class="text-center">Relatórios de Movimentações</h2>
<br><br>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <h5>Relatório de Movimentações por Tipo</h5>
        </div>
        <form class="form" action="/relmovimentos/tipo" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                        <select class="custom-select mr-sm-2" id="tipomov" name="tipomov">
                            <option selected>Escolha o Tipo</option>
                            @foreach ($tipomovs as $tipomov)
                                <option value="{{$tipomov->id}}">{{$tipomov->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="button btn-primary" value="Gerar">
        </form>
        <br><br>
        <div class="field">
            <h5>Relatório de Movimentações por Processo</h5>
        </div>
        <form class="form" action="/relmovimentos/processo" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                        <select class="custom-select mr-sm-2" id="processo" name="processo">
                            <option selected>Escolha o Processo</option>
                            @foreach ($processos as $processo)
                                <option value="{{$processo->id}}">{{$processo->numprocesso}}</option>
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
