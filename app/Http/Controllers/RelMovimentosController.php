<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Movimento;
use App\Models\Processo;
use App\Models\TipoMov;
use Illuminate\Http\Request;
use PDF;

class RelMovimentosController extends Controller
{
    public function index()
    {
        $tipomovs = TipoMov::orderby('id')->get();
        $processos = Processo::orderby('id')->get();

        return view('relmovimentos.index', ['tipomovs' => $tipomovs, 'processos' => $processos]);
    }

    public function tipo(Request $request)
    {
        $tipomov = TipoMov::findOrFail($request->tipomov);
        $movimentos = Movimento::query()->where('tipomov','=',$tipomov->id)->select(['*'])->orderBy('datamov')->get();
        $total = 0;
        foreach ($movimentos as $movimento){
            $movimento->processo_id = Processo::findOrFail($movimento->processo_id);
            $movimento->processo_id->area = Area::findOrFail($movimento->processo_id->area);
            $total++;
        }

        $data = ['movimentos' => $movimentos, 'tipomov' => $tipomov, 'total' => $total];
        $pdf = PDF::loadView('relmovimentos/tipo', $data)->setPaper('a4','landscape');

        return $pdf->stream('tipo.pdf');

    }

    public function processo(Request $request)
    {
        $processo = Processo::findOrFail($request->processo);
        $movimentos = Movimento::query()->where('processo_id','=',$processo->id)->select(['*'])->orderBy('datamov')->get();
        $total = 0;
        foreach ($movimentos as $movimento){
            $movimento->tipomov = TipoMov::findOrFail($movimento->tipomov);
            $movimento->processo_id = Processo::findOrFail($movimento->processo_id);
            $movimento->processo_id->area = Area::findOrFail($movimento->processo_id->area);
            $total++;
        }

        $data = ['movimentos' => $movimentos, 'processo' => $processo, 'total' => $total];
        $pdf = PDF::loadView('relmovimentos/processo', $data)->setPaper('a4','landscape');

        return $pdf->stream('processo.pdf');
    }
}
