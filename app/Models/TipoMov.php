<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMov extends Model
{
    protected $table = 'tipomovs';

    protected $fillable = ['id', 'descricao'];

    public function movimentos()
    {
        return $this->hasMany('App\Models\Movimento');
    }

    use HasFactory;
}
