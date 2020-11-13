@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Processo</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
            <div class="field">
                <strong>ID: </strong> {{$processo->id}}
            </div>
            <div class="field">
                <strong>Status: </strong> {{$processo->statusprocesso->descricao}}
            </div>
            <div class="field">
                <strong>Foro: </strong> {{$processo->foro}}
            </div>
            <div class="field">
                <strong>Vara: </strong> {{$processo->vara}}
            </div>
            <div class="field">
                <strong>Data de Início: </strong> {{date('d/m/Y', strtotime($processo->datainicio))}}
            </div>
            <div class="field">
                <strong>Número do Processo: </strong> {{$processo->numprocesso}}
            </div>
            <div class="field">
                <strong>Área: </strong> {{$processo->area->descricao}}
            </div>
            <div class="field">
                <strong>Classe: </strong> {{$processo->classe}}
            </div>
            <div class="field">
                <strong>Assunto: </strong> {{$processo->assunto}}
            </div>
            <div class="field">
                <strong>Parte Contrária: </strong> {{$processo->parte2}}
            </div>
            <div class="field">
                <strong>Advogado Parte Contrária: </strong> {{$processo->advparte2}}
            </div>
            <div class="field">
                <strong>Descrição: </strong> {{$processo->descricao}}
            </div>
        </div>
    </div>
    <div class="pull-right">
        <h2 class="text-center">Polos do Processo</h2>
    </div>
    <div class="col-12 pb-2">
        <div class="control">
            <a class="btn btn-success" href="{{ route('polos.create', $processo->id) }}">Novo Polo</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Tipo</th>
                <th>Parte</th>
                <th>Cliente</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            @foreach ($polos as $polo)
            <tr>
                <td>{{$polo->tipopolo->descricao}}</td>
                <td>{{$polo->parte->descricao}}</td>
                <td>{{$polo->cliente->nome}}</td>
                <td>{{$polo->cliente->fone1}}</td>
                <td>{{$polo->cliente->email}}</td>
                <td>
                    <a class="btn btn-info mr-2" href="{{ route('polos.show', $polo->id) }}">Mostrar</a>
                    <a class="btn btn-warning text-white mr-2" href="{{ route('polos.edit', $polo->id) }}">Editar</a>
                    <a class="btn btn-danger mr-2" href="{{ route('polos.apagar', $polo->id) }}">Apagar</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <br>
    <a class="btn btn-dark" href="{{route('processos.index')}}">Voltar</a>
</div>

@endsection
