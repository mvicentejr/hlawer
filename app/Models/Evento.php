<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';

    protected $fillable = ['id', 'dataevento', 'descricao', 'advogado', 'statusevento'];

    public $timestamps = false;

    public function advogado()
    {
        return $this->belongsTo('App\Models\Advogado');
    }

    public function statusevento()
    {
        return $this->belongsTo('App\Models\StatusEvento');
    }

    use HasFactory;
}
