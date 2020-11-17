<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\TipoCliente;
use Illuminate\Http\Request;
use PDF;

class RelClientesController extends Controller
{
    public function index()
    {
        $tipos = TipoCliente::orderby('id')->get();

        return view('relclientes.index', ['tipos' => $tipos]);
    }

    public function geral()
    {
        $clientes = Cliente::all();

        $total = 0;
        foreach ($clientes as $cliente){
            $cliente->tipocliente = TipoCliente::findOrFail($cliente->tipocliente);
            $total++;
        }

        $data = ['clientes' => $clientes, 'total' => $total];
        $pdf = PDF::loadView('relclientes/geral', $data)->setPaper('a4','landscape');

        return $pdf->stream('geral.pdf');
    }

    public function tipo(Request $request)
    {
        $tipo = TipoCliente::findOrFail($request->tipocliente);
        $clientes = Cliente::query()->where('tipocliente','=',$tipo->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        foreach ($clientes as $cliente){
            $cliente->tipocliente = TipoCliente::findOrFail($cliente->tipocliente);
            $total++;
        }

        $data = ['clientes' => $clientes, 'tipo' => $tipo, 'total' => $total];
        $pdf = PDF::loadView('relclientes/tipo', $data)->setPaper('a4','landscape');

        return $pdf->stream('tipo.pdf');

    }
}
