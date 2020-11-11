<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTarefa extends Model
{
    protected $table = 'tipotarefas';

    protected $fillable = ['id', 'descricao'];

    public function tarefas()
    {
        return $this->hasMany('App\Models\Tarefa');
    }

    use HasFactory;
}
