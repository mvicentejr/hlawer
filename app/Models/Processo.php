<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $table = 'processos';

    protected $fillable = ['id', 'statusprocesso', 'foro', 'vara', 'datainicio', 'numprocesso',
                        'area', 'classe', 'assunto', 'parte2', 'advparte2', 'descricao'];

    public $timestamps = false;

    public function statusprocesso()
    {
        return $this->belongsTo('App\Models\StatusProcesso');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function movimentos()
    {
        return $this->hasMany('App\Models\Movimento');
    }

    public function polos()
    {
        return $this->hasMany('App\Models\Polo');
    }

    public function tarefas()
    {
        return $this->hasMany('App\Models\Tarefa');
    }

    use HasFactory;
}
