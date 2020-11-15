@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Cadastrar Nova Movimentação</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/movimentos" method="POST">
        @csrf
            <input type="hidden" name="processo_id" value="{{$processo->id}}">
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                    <label class="mr-sm-2" for="tipomov"><strong>Tipo: </strong></label>
                    <select class="custom-select mr-sm-2" id="tipomov" name="tipomov">
                            <option selected disabled>Selecione uma opção</option>
                        @foreach ($tipomovs as $tipomov)
                            <option value="{{$tipomov->id}}">{{$tipomov->descricao}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                    <strong>Data da Movimentação: </strong>
                    <div class="control">
                        <input type="date" class="input" name="datamov">
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
