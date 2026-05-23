<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    protected $table = 'fases';

    protected $fillable = [
        'nome',
        'ordem',
        'id_bolao',
    ];

    // Relações
    public function bolao()
    {
        return $this->belongsTo(Bolao::class, 'id_bolao');
    }

    public function jogos()
    {
        return $this->hasMany(Jogo::class, 'id_fase');
    }
}
