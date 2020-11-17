<?php

namespace App\Http\Controllers;

use App\Models\Advogado;
use App\Models\Evento;
use App\Models\StatusEvento;
use Illuminate\Http\Request;
use PDF;

class RelEventosController extends Controller
{
    public function index()
    {
        $advogados = Advogado::orderby('id')->get();

        return view('releventos.index', ['advogados' => $advogados]);
    }

    public function periodo(Request $request)
    {
        $inicio = date('Y-m-d', strtotime($request->inicio));
        $fim = date('Y-m-d', strtotime($request->fim));
        $eventos = Evento::query()->where('dataevento','>=',$inicio)->where('dataevento','<=',$fim)->select(['*'])->orderBy('dataevento')->get();
        $total = 0;
        foreach ($eventos as $evento){
            $evento->advogado = Advogado::findOrFail($evento->advogado);
            $evento->statusevento = StatusEvento::findOrFail($evento->statusevento);
            $total++;
        }

        $data = ['eventos' => $eventos, 'total' => $total, 'inicio' => $inicio, 'fim' => $fim];
        $pdf = PDF::loadView('releventos/periodo', $data)->setPaper('a4','landscape');

        return $pdf->stream('periodo.pdf');

    }

    public function advogado(Request $request)
    {
        $advogado = Advogado::findOrFail($request->advogado);
        $eventos = Evento::query()->where('advogado','=',$advogado->id)->select(['*'])->orderBy('dataevento')->get();
        $total = 0;
        foreach ($eventos as $evento){
            $evento->statusevento = StatusEvento::findOrFail($evento->statusevento);
            $total++;
        }

        $data = ['eventos' => $eventos, 'advogado' => $advogado, 'total' => $total];
        $pdf = PDF::loadView('releventos/advogado', $data)->setPaper('a4','landscape');

        return $pdf->stream('advogado.pdf');
    }
}
