@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Editar Tarefa</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
            <strong>ID: </strong> {{$tarefa->id}}
        </div>
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-6">
                <label class="mr-sm-2" for="advogado"><strong>Advogado: </strong></label>
                <select class="custom-select mr-sm-2" id="advogado" name="advogado">
                    <option selected value="{{$tarefa->advogado->id}}">{{$tarefa->advogado->nome}}</option>
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
                <label class="mr-sm-2" for="process_id"><strong>Processo: </strong></label>
                <select class="custom-select mr-sm-2" id="processo_id" name="processo_id">
                    <option selected value="{{$tarefa->processo_id->id}}">{{$tarefa->processo_id->numprocesso}}</option>
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
                    <option selected value="{{$tarefa->statustarefa->id}}">{{$tarefa->statustarefa->descricao}}</option>
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
                <label class="mr-sm-2" for="tipotarefa"><strong>Tipo: </strong></label>
                <select class="custom-select mr-sm-2" id="tiptarefa" name="tipotarefa">
                    <option selected value="{{$tarefa->tipotarefa->id}}">{{$tarefa->tipotarefa->descricao}}</option>
                    @foreach ($tipotarefas as $tipotarefa)
                        <option value="{{$tipotarefa->id}}">{{$tipotarefa->descricao}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Data: </strong>
                    <div class="control">
                        <input type="date" class="input" name="datatarefa" value="{{$tarefa->datatarefa}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Descrição: </strong>
            <div class="control">
                <input type="text" class="input" name="descricao" value="{{$tarefa->descricao}}">
            </div>
        </div>
        <input type="hidden" name="prazo" value="{{$tarefa->prazo}}">
        <br><br>
        <input type="submit" class="button btn-success mr-2" value="Gravar">
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
