<?php

namespace App\Http\Controllers;

use App\Models\Advogado;
use App\Models\Evento;
use App\Models\StatusEvento;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::orderBy('statusevento', 'DESC')->orderBy('dataevento')->get();
        foreach ($eventos as $evento){
            $evento->advogado = Advogado::findOrFail($evento->advogado);
            $evento->statusevento = StatusEvento::findOrFail($evento->statusevento);
        }
        $advogados = Advogado::orderby('id')->get();

        return view('eventos.index', ['eventos' => $eventos, 'advogados' => $advogados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advogados = Advogado::orderby('id')->get();

        return view('eventos.create', ['advogados' => $advogados]);
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
            'dataevento' => 'required',
            'descricao' => 'required',
            'advogado' => 'required',
            'statusevento' => 'required'
        ]);

        Evento::create($request->all());

        return redirect()->route('eventos.index')->with('success', 'Evento cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->advogado = Advogado::findOrFail($evento->advogado);
        $evento->statusevento = StatusEvento::findOrFail($evento->statusevento);

        return view('eventos.show', ['evento' => $evento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::findorFail($id);
        $evento->advogado = Advogado::findOrFail($evento->advogado);
        $evento->statusevento = StatusEvento::findOrFail($evento->statusevento);

        $advogados = Advogado::orderby('id')->get();
        $statuseventos = StatusEvento::orderby('id')->get();

        return view('eventos.edit', ['evento' => $evento, 'advogados' => $advogados, 'statuseventos' => $statuseventos]);
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
            'dataevento' => 'required',
            'descricao' => 'required',
            'advogado' => 'required',
            'statusevento' => 'required'
        ]);

        $evento = Evento::findOrFail($id);
        $evento->update($request->all());

        return redirect()->route('eventos.index')->with('success', 'Evento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return redirect()->route('eventos.index')->with('success', 'Evento removido com sucesso!');
    }

    public function apagar($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->advogado = Advogado::findOrFail($evento->advogado);
        $evento->statusevento = StatusEvento::findOrFail($evento->statusevento);

        return view('eventos.apagar', ['evento' => $evento]);

    }

    public function mudastatus($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->statusevento = 1;
        $evento->update();

        return redirect()->route('eventos.index')->with('success', 'Evento finalizado com sucesso!');
    }

    public function finalizar($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->advogado = Advogado::findOrFail($evento->advogado);
        $evento->statusevento = StatusEvento::findOrFail($evento->statusevento);

        return view('eventos.finalizar', ['evento' => $evento]);

    }

    public function getadvogado(Request $request)
    {
        $advogado = Advogado::findOrFail($request->advogado);
        $eventos = Evento::query()->where('advogado','=',$advogado->id)->select(['*'])->orderBy('statusevento', 'DESC')->orderBy('dataevento')->get();
        foreach ($eventos as $evento){
            $evento->advogado = Advogado::findOrFail($evento->advogado);
            $evento->statusevento = StatusEvento::findOrFail($evento->statusevento);
        }

        return view('eventos.getadvogado', ['eventos' => $eventos, 'advogado' => $advogado]);
    }
}
