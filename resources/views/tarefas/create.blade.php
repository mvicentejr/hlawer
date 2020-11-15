@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Cadastrar Nova Tarefa</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/tarefas" method="POST">
        @csrf
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
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                    <label class="mr-sm-2" for="processo_id"><strong>Processo: </strong></label>
                    <select class="custom-select mr-sm-2" id="processo_id" name="processo_id">
                            <option selected disabled>Selecione uma opção</option>
                        @foreach ($processos as $processo)
                            <option value="{{$processo->id}}">{{$processo->numprocesso}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                    <label class="mr-sm-2" for="statustarefa"><strong>Status: </strong></label>
                    <select class="custom-select mr-sm-2" id="statustarefa" name="statustarefa">
                            <option selected disabled>Selecione uma opção</option>
                        @foreach ($statustarefas as $statustarefa)
                            <option value="{{$statustarefa->id}}">{{$statustarefa->descricao}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                    <label class="mr-sm-2" for="tipotarefa"><strong>Status: </strong></label>
                    <select class="custom-select mr-sm-2" id="tipotarefa" name="tipotarefa">
                            <option selected disabled>Selecione uma opção</option>
                        @foreach ($tipotarefas as $tipotarefa)
                            <option value="{{$tipotarefa->id}}">{{$tipotarefa->descricao}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                    <strong>Data da Tarefa: </strong>
                    <div class="control">
                        <input type="date" class="input" name="datatarefa">
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
            <input type="hidden" name="prazo" value="0">
            <br><br>
            <input type="submit" class="button btn-success mr-2" value="Gravar">
            <input type="reset" class="button btn-secondary mr-2" value="Limpar">
            <a class="btn btn-dark mr-2" href="{{route('tarefas.index')}}">Voltar</a>
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
