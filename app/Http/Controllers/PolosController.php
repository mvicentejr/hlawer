<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Parte;
use App\Models\Polo;
use App\Models\Processo;
use App\Models\TipoPolo;
use Illuminate\Http\Request;

class PolosController extends Controller
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
        $tipopolos = TipoPolo::orderby('id')->get();
        $partes = Parte::orderby('id')->get();
        $clientes = Cliente::orderby('nome')->get();

        return view('polos.create', ['tipopolos' => $tipopolos, 'partes' => $partes, 'clientes' => $clientes, 'processo' => $processo]);
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
            'tipopolo' => 'required',
            'parte' => 'required',
            'cliente' => 'required',
            'processo_id' => 'required'
        ]);

        Polo::create($request->all());

        $processo = $request->input('processo_id');

        return redirect()->route('processos.show', $processo)->with('success', 'Polo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function apagar($id)
    {
        //
    }
}
