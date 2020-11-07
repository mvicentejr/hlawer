@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Cadastrar Novo Cliente</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/clientes" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-4">
                    <label class="mr-sm-2" for="status"><strong>Tipo: </strong></label>
                    <select class="custom-select mr-sm-2" id="tipocliente" name="tipocliente">
                            <option selected disabled>Selecione uma opção</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Nome: </strong>
                <div class="control">
                    <input type="text" class="input" name="nome">
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>CNPJ: </strong>
                        <div class="control">
                            <input type="text" class="input" name="cnpj" id="cnpj" pattern="/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}|(\d{14})$" placeholder="88.888.888/8888-88">
                        </div>
                    </div>

                    <div class="col-6">
                        <strong>Inscrição Estadual: </strong>
                        <div class="control">
                            <input type="text" class="input" name="ie" id="ie" placeholder="888.888.888.888">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>CPF: </strong>
                        <div class="control">
                            <input type="text" class="input" name="cpf" id="cpf" pattern="^(\d{3}\.\d{3}\.\d{3}-\d{2})|(\d{11})$" placeholder="888.888.888-88">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>RG: </strong>
                        <div class="control">
                            <input type="text" class="input" name="rg" id="rg" placeholder="88.888.888-8">
                        </div>
                    </div>
                    <div class="col-3">
                        <strong>Órgão Emissor: </strong>
                        <div class="control">
                            <input type="text" class="input" name="oemissor" id="oemissor">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                    <strong>Data de Nascimento: </strong>
                    <div class="control">
                        <input type="date" class="input" name="datanasc" id="datanasc">
                    </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-4">
                    <label class="mr-sm-2" for="genero"><strong>Gênero: </strong></label>
                    <select class="custom-select mr-sm-2" id="genero" name="genero">
                        <option selected></option>
                        @foreach ($generos as $genero)
                            <option value="{{$genero}}">{{$genero}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-4">
                    <label class="mr-sm-2" for="estcivil"><strong>Estado Civil: </strong></label>
                    <select class="custom-select mr-sm-2" id="estcivil" name="estcivil">
                        <option selected></option>
                        @foreach ($estados as $estado)
                            <option value="{{$estado}}">{{$estado}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Cônjuge: </strong>
                <div class="control">
                    <input type="text" class="input" name="conjuge" id="conjuge">
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>CEP: </strong>
                        <div class="control">
                            <input type="text" class="input" name="cep" id="cep">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col">
                        <strong>Rua: </strong>
                        <div class="control">
                            <input type="text" class="input" name="rua" id="rua">
                        </div>
                    </div>
                    <div class="col-2">
                        <strong>Número: </strong>
                        <div class="control">
                            <input type="text" class="input" name="numero">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Bairro: </strong>
                        <div class="control">
                            <input type="text" class="input" name="bairro" id="bairro">
                        </div>
                    </div>
                    <div class="col">
                        <strong>Complemento: </strong>
                        <div class="control">
                            <input type="text" class="input" name="complemento">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col">
                        <strong>Cidade: </strong>
                        <div class="control">
                            <input type="text" class="input" name="cidade" id="cidade">
                        </div>
                    </div>
                    <div class="col-2">
                        <strong>Estado: </strong>
                        <div class="control">
                            <input type="text" class="input" name="uf" id="uf">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col">
                        <strong>Telefone 1: </strong>
                        <div class="control">
                            <input type="text" class="input" name="fone1" required placeholder="(88) 88888-8888" pattern="\([0-9]{2}\)[\s][0-9]{4,6}-[0-9]{3,4}">
                        </div>
                    </div>
                    <div class="col">
                        <strong>Telefone 2: </strong>
                        <div class="control">
                            <input type="text" class="input" name="fone2" placeholder="(88) 88888-8888" pattern="\([0-9]{2}\)[\s][0-9]{4,6}-[0-9]{3,4}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Email: </strong>
                <div class="control">
                    <input type="email" class="input" name="email">
                </div>
            </div>
            <div class="field">
                <strong>Observações: </strong>
                <div class="control">
                    <input type="text" class="input" name="observacao">
                </div>
            </div>
            <br><br>
            <input type="submit" class="button btn-success mr-2" value="Gravar">
            <input type="reset" class="button btn-secondary mr-2" value="Limpar">
            <a class="btn btn-dark mr-2" href="{{route('clientes.index')}}">Voltar</a>
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

    <script>
        let tipocliente = $("#tipocliente");
        tipocliente.change(function(){
            var inputcpf = $("#cpf");
            var inputcnpj = $("#cnpj");
            var inputie = $("#ie");
            var inputrg = $("#rg");
            var inputoemissor = $("#oemissor");
            var inputdatanasc = $("#datanasc");
            var inputgenero = $("#genero");
            var inputestcivil = $("#estcivil");
            var inputconjuge = $("#conjuge");
            if (tipocliente.val() == 1){
                inputcnpj.prop("disabled", true);
                inputie.prop("disabled", true);
                inputcpf.prop("disabled", false);
                inputrg.prop("disabled", false);
                inputoemissor.prop("disabled", false);
                inputdatanasc.prop("disabled", false);
                inputgenero.prop("disabled", false);
                inputestcivil.prop("disabled", false);
                inputconjuge.prop("disabled", false);
            }
            else{
                inputcnpj.prop("disabled", false);
                inputie.prop("disabled", false);
                inputcpf.prop("disabled", true);
                inputrg.prop("disabled", true);
                inputoemissor.prop("disabled", true);
                inputdatanasc.prop("disabled", true);
                inputgenero.prop("disabled", true);
                inputestcivil.prop("disabled", true);
                inputconjuge.prop("disabled", true);
            }
        });
    </script>

@endsection
