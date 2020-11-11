<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusEvento extends Model
{
    protected $table = 'statuseventos';

    protected $fillable = ['id', 'descricao'];

    public function eventos()
    {
        return $this->hasMany('App\Models\Evento');
    }

    use HasFactory;
}
