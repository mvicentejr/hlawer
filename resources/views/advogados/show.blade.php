@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Advogado</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
            <div class="field">
                <strong>ID: </strong> {{$advogado->id}}
            </div>
            <div class="field">
                <strong>Data de Cadastro: </strong> {{date('d/m/Y H:i', strtotime($advogado->datacadastro))}}
            </div>
            <div class="field">
                <strong>Nome: </strong> {{$advogado->nome}}
            </div>
            <div class="field">
                <strong>Area: </strong> {{$advogado->area->descricao}}
            </div>
            <div class="field">
                <strong>OAB: </strong> {{$advogado->cpf}}
            </div>
            <div class="field">
                <strong>CPF: </strong> {{$advogado->cpf}}
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>RG: </strong> {{$advogado->rg}}
                    </div>
                    <div class="col">
                        <strong>Orgão Emissor: </strong> {{$advogado->oemissor}}
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Data de Nascimento: </strong> {{date('d/m/Y', strtotime($advogado->datanasc))}}
            </div>
            <div class="field">
                <strong>Gênero: </strong> {{$advogado->genero}}
            </div>
            <div class="field">
                <strong>Estado Civil: </strong> {{$advogado->estcivil}}
            </div>
            <div class="field">
                <strong>Cônjuge: </strong> {{$advogado->conjuge}}
            </div>
            <div class="field">
                <strong>CEP: </strong> {{$advogado->cep}}
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-8">
                        <strong>Rua: </strong> {{$advogado->rua}}
                    </div>
                    <div class="col">
                        <strong>Número: </strong> {{$advogado->numero}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Bairro: </strong> {{$advogado->bairro}}
                    </div>
                    <div class="col">
                        <strong>Complemento: </strong> {{$advogado->complemento}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Cidade: </strong> {{$advogado->cidade}}
                    </div>
                    <div class="col">
                        <strong>Estado: </strong> {{$advogado->uf}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Telefone 1: </strong> {{$advogado->fone1}}
                    </div>
                    <div class="col">
                        <strong>Telefone 2: </strong> {{$advogado->fone2}}
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Email: </strong> {{$advogado->email}}
            </div>
            <div class="field">
                <strong>Observações: </strong> {{$advogado->observacao}}
            </div>
            <br>
            <a class="btn btn-dark" href="{{route('advogados.index')}}">Voltar</a>
        </div>
    </div>

@endsection
