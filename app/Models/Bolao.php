<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bolao extends Model
{
    protected $table = 'boloes';

    protected $fillable = [
        'nome',
        'descricao',
        'id_admin',
        'ativo',
    ];

    // Relações
    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function fases()
    {
        return $this->hasMany(Fase::class, 'id_bolao');
    }

    public function regras()
    {
        return $this->hasMany(Regra::class, 'id_bolao');
    }

    public function premios()
    {
        return $this->hasMany(Premio::class, 'id_bolao');
    }

    public function jogos()
    {
        return $this->hasMany(Jogo::class, 'id_bolao');
    }
}
