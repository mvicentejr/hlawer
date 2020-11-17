@extends('layout')
@section('content')

<h2 class="text-center">Relatórios de Advogados</h2>
<br><br>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <h5>Relatório Geral de Advogados</h5>
        </div>
        <div class="field">
            <a class="btn btn-primary" href="{{ route('reladvogados.geral') }}">Gerar</a>
        </div>
        <br><br>
        <div class="field">
            <h5>Relatório de Advogados por Área</h5>
        </div>
        <form class="form" action="/reladvogados/area" method="POST">
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
    </div>
</div>


@endsection
