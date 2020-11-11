<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parte extends Model
{
    protected $table = 'partes';

    protected $fillable = ['id', 'descricao'];

    public function polos()
    {
        return $this->hasMany('App\Models\Polo');
    }

    use HasFactory;
}
