<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    protected $table = 'movimentos';

    protected $fillable = ['id', 'processo_id', 'tipomov', 'datamov', 'descricao'];

    public $timestamps = false;

    public function processo()
    {
        return $this->belongsTo('App\Models\Processo');
    }

    public function tipomov()
    {
        return $this->belongsTo('App\Models\TipoMov');
    }

    use HasFactory;
}
