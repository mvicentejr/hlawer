<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    protected $table = 'tipoclientes';

    protected $fillable = ['id', 'descricao'];

    public function clientes()
    {
        return $this->hasMany('App\Models\Cliente');
    }

    use HasFactory;
}
