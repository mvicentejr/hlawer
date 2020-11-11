<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusProcesso extends Model
{
    protected $table = 'statusprocessos';

    protected $fillable = ['id', 'descricao'];

    public function processos()
    {
        return $this->hasMany('App\Models\Processo');
    }
    
    use HasFactory;
}
