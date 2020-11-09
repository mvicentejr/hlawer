<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    protected $fillable = ['id', 'descricao'];

    public function advogados()
    {
        return $this->hasMany('App\Models\Advogado');
    }

    public function processos()
    {
        return $this->hasMany('App\Models\Processo');
    }

    use HasFactory;
}
