<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Cliente;
use App\Models\Parte;
use App\Models\Polo;
use App\Models\Processo;
use App\Models\StatusProcesso;
use App\Models\TipoPolo;
use Illuminate\Http\Request;
use PDF;

class RelProcessosController extends Controller
{
    public function index()
    {
        $statusprocessos = StatusProcesso::orderby('id')->get();
        $clientes = Cliente::orderby('id')->get();
        $areas = Area::orderby('id')->get();

        return view('relprocessos.index', ['statusprocessos' => $statusprocessos, 'clientes' => $clientes, 'areas' => $areas]);
    }

    public function status(Request $request)
    {
        $status = StatusProcesso::findOrFail($request->statusprocesso);
        $processos = Processo::query()->where('statusprocesso','=',$status->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        foreach ($processos as $processo){
            $processo->area = Area::findOrFail($processo->area);
            $total++;
        }

        $data = ['processos' => $processos, 'status' => $status, 'total' => $total];
        $pdf = PDF::loadView('relprocessos/status', $data)->setPaper('a4','landscape');

        return $pdf->stream('status.pdf');

    }

    public function area(Request $request)
    {
        $area = Area::findOrFail($request->area);
        $processos = Processo::query()->where('area','=',$area->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        foreach ($processos as $processo){
            $processo->statusprocesso = StatusProcesso::findOrFail($processo->statusprocesso);
            $total++;
        }

        $data = ['processos' => $processos, 'area' => $area, 'total' => $total];
        $pdf = PDF::loadView('relprocessos/area', $data)->setPaper('a4','landscape');

        return $pdf->stream('area.pdf');

    }

    public function cliente(Request $request)
    {
        $cliente = Cliente::findOrFail($request->cliente);
        $polos = Polo::query()->where('cliente','=',$cliente->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        foreach ($polos as $polo){
            $polo->tipopolo = TipoPolo::findOrFail($polo->tipopolo);
            $polo->parte = Parte::findOrFail($polo->parte);
            $polo->processo_id = Processo::findOrFail($polo->processo_id);
            $polo->processo_id->statusprocesso = StatusProcesso::findOrFail($polo->processo_id->statusprocesso);
            $polo->processo_id->area = Area::findOrFail($polo->processo_id->area);
            $total++;
        }

        $data = ['polos' => $polos, 'cliente' => $cliente, 'total' => $total];
        $pdf = PDF::loadView('relprocessos/cliente', $data)->setPaper('a4','landscape');

        return $pdf->stream('cliente.pdf');
    }
}
