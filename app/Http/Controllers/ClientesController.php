<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\TipoCliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        foreach ($clientes as $cliente)
            $cliente->tipocliente = TipoCliente::findOrFail($cliente->tipocliente);
        return view('clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoCliente::orderby('id')->get();
        $generos = ['Feminino', 'Masculino'];
        $estados = ['Solteiro', 'Casado', 'Separado', 'Amasiado', 'Viuvo'];
        return view('clientes.create', ['tipos' => $tipos, 'generos' => $generos, 'estados'=> $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->tipocliente == 1) {
            $this->validate($request, [
                'nome' => 'required',
                'cpf' => 'required',
                'rg' => 'required',
                'oemissor' => 'required',
                'datanasc' => 'required',
                'genero' => 'required',
                'estcivil' => 'required',
                'cep' => 'required',
                'rua' => 'required',
                'numero' => 'required',
                'bairro' => 'required',
                'cidade' => 'required',
                'uf' => 'required | max:2',
                'fone1' => 'required',
                'email' => 'required'
            ]);
        }
        else if ($request->tipocliente == 2){
            $this->validate($request, [
                'nome' => 'required',
                'cnpj' => 'required',
                'ie' => 'required',
                'cep' => 'required',
                'rua' => 'required',
                'numero' => 'required',
                'bairro' => 'required',
                'cidade' => 'required',
                'uf' => 'required | max:2',
                'fone1' => 'required',
                'email' => 'required'
            ]);
        }

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->tipocliente = TipoCliente::findOrFail($cliente->tipocliente);
        return view('clientes.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findorFail($id);
        $cliente->tipocliente = TipoCliente::findOrFail($cliente->tipocliente);

        $tipos = TipoCliente::orderby('id')->get();
        $generos = ['Feminino', 'Masculino'];
        $estados = ['Solteiro', 'Casado', 'Separado', 'Amasiado', 'Viuvo'];

        return view('clientes.edit', ['cliente' => $cliente, 'tipos' => $tipos, 'generos' => $generos, 'estados'=> $estados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->tipocliente == 1) {
            $this->validate($request, [
                'nome' => 'required',
                'cpf' => 'required',
                'rg' => 'required',
                'oemissor' => 'required',
                'datanasc' => 'required',
                'genero' => 'required',
                'estcivil' => 'required',
                'cep' => 'required',
                'rua' => 'required',
                'numero' => 'required',
                'bairro' => 'required',
                'cidade' => 'required',
                'uf' => 'required | max:2',
                'fone1' => 'required',
                'email' => 'required'
            ]);
        }
        else if ($request->tipocliente == 2){
            $this->validate($request, [
                'nome' => 'required',
                'cnpj' => 'required',
                'ie' => 'required',
                'cep' => 'required',
                'rua' => 'required',
                'numero' => 'required',
                'bairro' => 'required',
                'cidade' => 'required',
                'uf' => 'required | max:2',
                'fone1' => 'required',
                'email' => 'required'
            ]);
        }

        $cliente = Cliente::findOrFail($id);

        $cliente->update($request->all());

        $nome = $request->input('nome');

        return redirect()->route('clientes.index')->with('success', 'Cliente '. $nome .' atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        return $cliente->delete();
    }
}
