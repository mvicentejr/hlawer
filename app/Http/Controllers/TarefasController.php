<?php

namespace App\Http\Controllers;

use App\Models\Advogado;
use App\Models\Processo;
use App\Models\StatusTarefa;
use App\Models\Tarefa;
use App\Models\TipoTarefa;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarefas = Tarefa::orderBy('statustarefa')->orderBy('tipotarefa')->orderBy('prazo')->get();
        foreach ($tarefas as $tarefa){
            $tarefa->advogado = Advogado::findOrFail($tarefa->advogado);
            $tarefa->processo_id = Processo::findOrFail($tarefa->processo_id);
            $tarefa->statustarefa = StatusTarefa::findOrFail($tarefa->statustarefa);
            $tarefa->tipotarefa = TipoTarefa::findOrFail($tarefa->tipotarefa);
            TarefasController::atualizar($tarefa->id);
        }
        return view('tarefas.index', ['tarefas' => $tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advogados = Advogado::orderby('id')->get();
        $processos = Processo::query()->where('statusprocesso','=',1)->select(['*'])->orderBy('id')->get();
        $statustarefas = StatusTarefa::orderby('id')->get();
        $tipotarefas = TipoTarefa::orderby('id')->get();

        return view('tarefas.create', ['advogados' => $advogados, 'processos' => $processos, 'statustarefas' => $statustarefas, 'tipotarefas' => $tipotarefas]);
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
            'advogado' => 'required',
            'processo_id' => 'required',
            'statustarefa' => 'required',
            'tipotarefa' => 'required',
            'datatarefa' => 'required',
            'descricao' => 'required'
        ]);

        $tarefa = Tarefa::create($request->all());

        TarefasController::atualizar($tarefa->id);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->advogado = Advogado::findOrFail($tarefa->advogado);
        $tarefa->processo_id = Processo::findOrFail($tarefa->processo_id);
        $tarefa->statustarefa = StatusTarefa::findOrFail($tarefa->statustarefa);
        $tarefa->tipotarefa = TipoTarefa::findOrFail($tarefa->tipotarefa);

        return view('tarefas.show', ['tarefa' => $tarefa]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarefa = Tarefa::findorFail($id);
        $tarefa->advogado = Advogado::findOrFail($tarefa->advogado);
        $tarefa->processo_id = Processo::findOrFail($tarefa->processo_id);
        $tarefa->statustarefa = StatusTarefa::findOrFail($tarefa->statustarefa);
        $tarefa->tipotarefa = TipoTarefa::findOrFail($tarefa->tipotarefa);

        $advogados = Advogado::orderby('id')->get();
        $processos = Processo::query()->where('statusprocesso','=',1)->select(['*'])->orderBy('id')->get();
        $statustarefas = StatusTarefa::orderby('id')->get();
        $tipotarefas = TipoTarefa::orderby('id')->get();

        return view('tarefas.edit', ['tarefa' => $tarefa, 'advogados' => $advogados, 'processos' => $processos, 'statustarefas' => $statustarefas, 'tipotarefas' => $tipotarefas]);
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
            'advogado' => 'required',
            'processo_id' => 'required',
            'statustarefa' => 'required',
            'tipotarefa' => 'required',
            'datatarefa' => 'required',
            'descricao' => 'required'
        ]);

        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update($request->all());

        $dif = strtotime($tarefa->datatarefa) - strtotime(date('Y/m/d'));
        $tarefa->prazo = floor($dif/(60*60*24));
        $tarefa->update();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa removida com sucesso!');
    }

    public function apagar($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->advogado = Advogado::findOrFail($tarefa->advogado);
        $tarefa->processo_id = Processo::findOrFail($tarefa->processo_id);
        $tarefa->statustarefa = StatusTarefa::findOrFail($tarefa->statustarefa);
        $tarefa->tipotarefa = TipoTarefa::findOrFail($tarefa->tipotarefa);

        return view('tarefas.apagar', ['tarefa' => $tarefa]);

    }

    public static function atualizar($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $dif = strtotime($tarefa->datatarefa) - strtotime(date('Y/m/d'));
        $tarefa->prazo = floor($dif/(60*60*24));
        $tarefa->update(['prazo' => $tarefa->prazo]);
        return;
    }
}
