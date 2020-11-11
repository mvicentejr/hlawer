<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table = 'tarefas';

    protected $fillable = ['id', 'advogado', 'processo', 'statustarefa', 'tipotarefa', 'datatarefa',
                        'descricao', 'prazo'];

    public $timestamps = false;

    public function advogado()
    {
        return $this->belongsTo('App\Models\Advogado');
    }

    public function processo()
    {
        return $this->belongsTo('App\Models\Processo');
    }

    public function tipotarefa()
    {
        return $this->belongsTo('App\Models\TipoTarefa');
    }

    public function statustarefa()
    {
        return $this->belongsTo('App\Models\StatusTarefa');
    }

    use HasFactory;
}
