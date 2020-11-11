<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTarefa extends Model
{
    protected $table = 'statustarefas';

    protected $fillable = ['id', 'descricao'];

    public function tarefas()
    {
        return $this->hasMany('App\Models\Tarefa');
    }

    use HasFactory;
}
