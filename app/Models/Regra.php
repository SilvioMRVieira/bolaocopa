<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regra extends Model
{
    protected $table = 'regras';

    protected $fillable = [
        'id_bolao',
        'nome_regra',
        'valor_pontos',
        'descritivo',
    ];

    // Relações
    public function bolao()
    {
        return $this->belongsTo(Bolao::class, 'id_bolao');
    }
}