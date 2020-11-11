<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polo extends Model
{
    protected $table = 'polos';

    protected $fillable = ['id', 'tipopolo', 'parte', 'cliente', 'processo'];

    public $timestamps = false;

    public function tipopolo()
    {
        return $this->belongsTo('App\Models\TipoPolo');
    }

    public function parte()
    {
        return $this->belongsTo('App\Models\Parte');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function processo()
    {
        return $this->belongsTo('App\Models\Processo');
    }

    use HasFactory;
}
