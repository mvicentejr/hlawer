<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = ['id', 'tipocliente', 'datacadastro', 'nome', 'cnpj', 'cpf', 'ie', 'rg', 'oemissor',
                        'datanasc', 'genero', 'estcivil', 'conjuge', 'cep', 'rua', 'numero', 'bairro',
                        'complemento', 'cidade', 'uf', 'fone1', 'fone2', 'email', 'observacao'];

    public $timestamps = false;

    public function tipo()
    {
        return $this->belongsTo('App\Models\TipoCliente');
    }

    public function polos()
    {
        return $this->hasMany('App\Models\Polo');
    }

    use HasFactory;
}
