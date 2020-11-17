<?php

namespace App\Http\Controllers;

use App\Models\Advogado;
use App\Models\Area;
use PDF;
use Illuminate\Http\Request;

class RelAdvogadosController extends Controller
{
    public function index()
    {
        $areas = Area::orderby('id')->get();

        return view('reladvogados.index', ['areas' => $areas]);
    }

    public function geral()
    {
        $advogados = Advogado::all();

        $total = 0;
        foreach ($advogados as $advogado){
            $advogado->area = Area::findOrFail($advogado->area);
            $total++;
        }

        $data = ['advogados' => $advogados, 'total' => $total];
        $pdf = PDF::loadView('reladvogados/geral', $data)->setPaper('a4','landscape');

        return $pdf->stream('geral.pdf');
    }

    public function area(Request $request)
    {
        $area = Area::findOrFail($request->area);
        $advogados = Advogado::query()->where('area','=',$area->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        foreach ($advogados as $advogado){
            $advogado->area = Area::findOrFail($advogado->area);
            $total++;
        }

        $data = ['advogados' => $advogados, 'area' => $area, 'total' => $total];
        $pdf = PDF::loadView('reladvogados/area', $data)->setPaper('a4','landscape');

        return $pdf->stream('area.pdf');

    }
}
