@extends('layout')
@section('content')

<h2 class="text-center">Relatórios de Tarefas</h2>
<br><br>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <h5>Relatório de Tarefas por Status</h5>
        </div>
        <form class="form" action="/reltarefas/status" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                        <select class="custom-select mr-sm-2" id="statustarefa" name="statustarefa">
                            <option selected>Escolha o Status</option>
                            @foreach ($statustarefas as $statustarefa)
                                <option value="{{$statustarefa->id}}">{{$statustarefa->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="button btn-primary" value="Gerar">
        </form>
        <br><br>
        <div class="field">
            <h5>Relatório de Tarefas por Advogado</h5>
        </div>
        <form class="form" action="/reltarefas/advogado" method="POST">
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
