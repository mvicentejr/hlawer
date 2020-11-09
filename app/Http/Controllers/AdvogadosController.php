<?php

namespace App\Http\Controllers;

use App\Models\Advogado;
use App\Models\Area;
use Illuminate\Http\Request;

class AdvogadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advogados = Advogado::all();
        foreach ($advogados as $advogado)
            $advogado->area = Area::findOrFail($advogado->area);
        return view('advogados.index', ['advogados' => $advogados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::orderby('id')->get();
        $generos = ['Feminino', 'Masculino'];
        $estados = ['Solteiro', 'Casado', 'Separado', 'Amasiado', 'Viuvo'];

        return view('advogados.create', ['areas' => $areas, 'generos' => $generos, 'estados' => $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'oab' => 'required',
            'area' => 'required',
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

        Advogado::create($request->all());

        return redirect()->route('advogados.index')->with('success', 'Advogado cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advogado = Advogado::findOrFail($id);
        $advogado->area = Area::findOrFail($advogado->area);
        return view('advogados.show', ['advogado' => $advogado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advogado = Advogado::findorFail($id);
        $advogado->area = Area::findOrFail($advogado->area);

        $areas = Area::orderby('id')->get();
        $generos = ['Feminino', 'Masculino'];
        $estados = ['Solteiro', 'Casado', 'Separado', 'Amasiado', 'Viuvo'];

        return view('advogados.edit', ['advogado' => $advogado, 'areas' => $areas, 'generos' => $generos, 'estados'=> $estados]);
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
        $this->validate($request, [
            'nome' => 'required',
            'oab' => 'required',
            'area' => 'required',
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

        $advogado = Advogado::findOrFail($id);

        $advogado->update($request->all());

        $nome = $request->input('nome');

        return redirect()->route('advogados.index')->with('success', 'Advogado '. $nome .' atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advogado = Advogado::findOrFail($id);
        $advogado->delete();

        return redirect()->route('advogados.index')->with('success', 'Advogado removido com sucesso!');
    }
}
