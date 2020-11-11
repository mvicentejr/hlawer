<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Movimento;
use App\Models\Processo;
use App\Models\StatusProcesso;
use Illuminate\Http\Request;

class ProcessosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processos = Processo::query()->where('statusprocesso','=',1)->select(['*'])->orderBy('id')->get();
        foreach ($processos as $processo){
            $processo->statusprocesso = StatusProcesso::findOrFail($processo->statusprocesso);
            $processo->area = Area::findOrFail($processo->area);
        }
        return view('processos.index', ['processos' => $processos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::orderby('id')->get();
        return view('processos.create', ['areas' => $areas]);
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
            'foro' => 'required',
            'vara' => 'required',
            'statusprocesso' => 'required',
            'data_inicio' => 'required',
            'numprocesso' => 'required',
            'area' => 'required',
            'classe' => 'required',
            'assunto' => 'required'
        ]);

        Processo::create($request->all());

        return redirect()->route('processos.index')->with('success', 'Processo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $processo = Processo::findOrFail($id);
        $processo->statusprocesso = StatusProcesso::findOrFail($processo->statusprocesso);
        $processo->area = Area::findOrFail($processo->area);
        return view('processos.show', ['processo' => $processo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $processo = Processo::findorFail($id);
        $processo->statusprocesso = StatusProcesso::findOrFail($processo->statusprocesso);
        $processo->area = Area::findOrFail($processo->area);

        $areas = Area::orderby('id')->get();

        return view('processos.edit', ['processo' => $processo, 'areas'=> $areas]);
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
            'foro' => 'required',
            'vara' => 'required',
            'statusprocesso' => 'required',
            'data_inicio' => 'required',
            'numprocesso' => 'required',
            'area' => 'required',
            'classe' => 'required',
            'assunto' => 'required'
        ]);

        $processo = Processo::findOrFail($id);

        $processo->update($request->all());

        if ($processo->statusprocesso != 1){
            $statusprocesso = StatusProcesso::findOrFail($processo->statusprocesso);
            $insert = [
                'processo' => $processo->id,
                'tipomov' => 2,
                'datamov' => date('Y/m/d'),
                'descricao' => $statusprocesso->descricao
            ];
            Movimento::create($insert);
        }

        $numprocesso = $request->input('numprocesso');

        return redirect()->route('processos.index')->with('success', 'Processo '. $numprocesso .' atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mudar($id)
    {
        $processo = Processo::findorFail($id);
        $processo->statusprocesso = StatusProcesso::findOrFail($processo->statusprocesso);
        $processo->area = Area::findOrFail($processo->area);

        $statusprocessos = StatusProcesso::orderby('id')->get();

        return view('processos.mudar', ['processo' => $processo, 'statusprocessos'=> $statusprocessos]);
    }

    public function getstatus($id)
    {
        $statusprocesso = StatusProcesso::finOrFail($id);
        $processos = Processo::query()->where('statusprocesso','=',$statusprocesso->id)->select(['*'])->orderBy('id')->get();
        foreach ($processos as $processo){
            $processo->statusprocesso = StatusProcesso::findOrFail($processo->statusprocesso);
            $processo->area = Area::findOrFail($processo->area);
        }
        return view('processos.getstatus', ['processos' => $processos]);
    }
}
