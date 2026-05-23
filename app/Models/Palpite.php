<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Palpite extends Model
{
    protected $table = 'palpites';

    protected $fillable = [
        'id_usuario',
        'id_jogo',
        'gols_palpite_a',
        'gols_palpite_b',
        'pontos',
    ];

    // Relações
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function jogo()
    {
        return $this->belongsTo(Jogo::class, 'id_jogo');
    }
}