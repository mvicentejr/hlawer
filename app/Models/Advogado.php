<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advogado extends Model
{
    protected $table = 'advogados';

    protected $fillable = ['id', 'datacadastro', 'nome', 'area', 'oab', 'cpf', 'rg', 'oemissor',
                        'datanasc', 'genero', 'estcivil', 'conjuge', 'cep', 'rua', 'numero', 'bairro',
                        'complemento', 'cidade', 'uf', 'fone1', 'fone2', 'email', 'observacao'];

    public $timestamps = false;

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function eventos()
    {
        return $this->hasMany('App\Models\Evento');
    }

    public function tarefas()
    {
        return $this->hasMany('App\Models\Tarefa');
    }

    use HasFactory;
}
