<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    protected $table = 'premios';

    protected $fillable = [
        'id_bolao',
        'descricao',
        'valor_total',
        'regra_divisao',
    ];

    // Relações
    public function bolao()
    {
        return $this->belongsTo(Bolao::class, 'id_bolao');
    }
}