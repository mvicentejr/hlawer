<?php

namespace App\Http\Controllers;

use App\Models\Movimento;
use App\Models\Processo;
use App\Models\TipoMov;
use Illuminate\Http\Request;

class MovimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($processo)
    {
        $processo = Processo::FindOrFail($processo);
        $tipomovs = TipoMov::orderby('id')->get();

        return view('movimentos.create', ['tipomovs' => $tipomovs, 'processo' => $processo]);
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
            'processo_id' => 'required',
            'tipomov' => 'required',
            'datamov' => 'required',
            'descricao' => 'required'
        ]);

        Movimento::create($request->all());

        $processo = $request->input('processo_id');

        return redirect()->route('processos.show', $processo)->with('success', 'Movimentação cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movimento = Movimento::findOrFail($id);
        $movimento->tipomov = TipoMov::findOrFail($movimento->tipomov);
        $movimento->processo_id = Processo::findOrFail($movimento->processo_id);
        return view('movimentos.show', ['movimento' => $movimento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movimento = Movimento::findorFail($id);
        $movimento->tipomov = TipoMov::findOrFail($movimento->tipomov);
        $movimento->processo_id = Processo::findOrFail($movimento->processo_id);

        $tipomovs = TipoMov::orderby('id')->get();

        return view('movimentos.edit', ['movimento' => $movimento, 'tipomovs' => $tipomovs]);
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
            'processo_id' => 'required',
            'tipomov' => 'required',
            'datamov' => 'required',
            'descricao' => 'required'
        ]);

        $movimento = Movimento::findOrFail($id);

        $movimento->update($request->all());

        $processo = $request->input('processo_id');

        return redirect()->route('processos.show', $processo)->with('success', 'Movimentação atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movimento = Movimento::findOrFail($id);
        $movimento->processo_id = Processo::findOrFail($movimento->processo_id);
        $processo = $movimento->processo_id->id;
        $movimento->delete();

        return redirect()->route('processos.show', $processo)->with('success', 'Movimentação removida com sucesso!');
    }

    public function apagar($id)
    {
        $movimento = Movimento::findOrFail($id);
        $movimento->tipomov = TipoMov::findOrFail($movimento->tipomov);
        $movimento->processo_id = Processo::findOrFail($movimento->processo_id);

        return view('movimentos.apagar', ['movimento' => $movimento]);
    }

}
