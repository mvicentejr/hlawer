@extends('layout')
@section('content')

<h2 class="text-center">Listar Agenda</h2>
<br><br>
<div class="col-12 pb-2">
    <div class="form-row">
        <div class="col-8">
            <a class="btn btn-success" href="{{ route('eventos.create') }}">Novo Evento</a>
        </div>
        <div class="col-4">
            <form class="form" action="/eventos/getadvogado" method="POST">
            @csrf
            <div class="form-row ">
                <div class="col-6">
                    <label class="mr-sm-2" for="advogado"><strong>Filtrar por Advogado: </strong></label>
                    <select class="custom-select mr-sm-2" id="advogado" name="advogado">
                        <option selected disabled>Selecione uma opção</option>
                        @foreach ($advogados as $advogado)
                            <option value="{{$advogado->id}}">{{$advogado->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col d-flex align-items-end">
                    <input type="submit" class="button btn-primary" value="Filtrar">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="table-responsive col-12">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>Data</th>
        <th>Hora</th>
        <th>Advogado</th>
        <th>Descrição</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    @foreach ($eventos as $evento)
        <tr>
            <td>{{date('d/m/Y', strtotime($evento->dataevento))}}</td>
            <td>{{date('H:i', strtotime($evento->dataevento))}}</td>
            <td>{{$evento->advogado->nome}}</td>
            <td>{{$evento->descricao}}</td>
            <td>{{$evento->statusevento->descricao}}</td>
            <td>
                <a class="btn btn-info mr-2" href="{{ route('eventos.show', $evento->id) }}">Mostrar</a>
                <a class="btn btn-warning text-white mr-2" href="{{ route('eventos.edit', $evento->id) }}">Editar</a>
                <a class="btn btn-danger mr-2" href="{{ route('eventos.apagar', $evento->id) }}">Apagar</a>
                <a class="btn btn-secondary mr-2" href="{{ route('eventos.finalizar', $evento->id) }}">Finalizar</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
<br><br>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

@endsection

