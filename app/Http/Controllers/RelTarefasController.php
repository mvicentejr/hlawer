<?php

namespace App\Http\Controllers;

use App\Models\Advogado;
use App\Models\Processo;
use App\Models\StatusTarefa;
use App\Models\Tarefa;
use App\Models\TipoTarefa;
use Illuminate\Http\Request;
use PDF;

class RelTarefasController extends Controller
{
    public function index()
    {
        $statustarefas = StatusTarefa::orderby('id')->get();
        $advogados = Advogado::orderby('id')->get();

        return view('reltarefas.index', ['statustarefas' => $statustarefas, 'advogados' => $advogados]);
    }

    public function status(Request $request)
    {
        $status = StatusTarefa::findOrFail($request->statustarefa);
        $tarefas = Tarefa::query()->where('statustarefa','=',$status->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        foreach ($tarefas as $tarefa){
            $tarefa->advogado = Advogado::findOrFail($tarefa->advogado);
            $tarefa->processo_id = Processo::findOrFail($tarefa->processo_id);
            $tarefa->statustarefa = StatusTarefa::findOrFail($tarefa->statustarefa);
            $tarefa->tipotarefa = TipoTarefa::findOrFail($tarefa->tipotarefa);
            $total++;
        }

        $data = ['tarefas' => $tarefas, 'status' => $status, 'total' => $total];
        $pdf = PDF::loadView('reltarefas/status', $data)->setPaper('a4','landscape');

        return $pdf->stream('status.pdf');

    }

    public function advogado(Request $request)
    {
        $advogado = Advogado::findOrFail($request->advogado);
        $tarefas = Tarefa::query()->where('advogado','=',$advogado->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        foreach ($tarefas as $tarefa){
            $tarefa->advogado = Advogado::findOrFail($tarefa->advogado);
            $tarefa->processo_id = Processo::findOrFail($tarefa->processo_id);
            $tarefa->statustarefa = StatusTarefa::findOrFail($tarefa->statustarefa);
            $tarefa->tipotarefa = TipoTarefa::findOrFail($tarefa->tipotarefa);
            $total++;
        }

        $data = ['tarefas' => $tarefas, 'advogado' => $advogado, 'total' => $total];
        $pdf = PDF::loadView('reltarefas/advogado', $data)->setPaper('a4','landscape');

        return $pdf->stream('advogado.pdf');
    }
}
