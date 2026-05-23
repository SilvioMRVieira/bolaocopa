<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    protected $table = 'jogos';

    protected $fillable = [
        'id_time_a',
        'id_time_b',
        'gols_time_a',
        'gols_time_b',
        'data_hora',
        'id_fase',
        'id_bolao',
        'status',
    ];

    public function timeA()
    {
        return $this->belongsTo(Time::class, 'id_time_a');
    }

    public function timeB()
    {
        return $this->belongsTo(Time::class, 'id_time_b');
    }

    // Relações
    public function fase()
    {
        return $this->belongsTo(Fase::class, 'id_fase');
    }

    public function bolao()
    {
        return $this->belongsTo(Bolao::class, 'id_bolao');
    }

    public function palpites()
    {
        return $this->hasMany(Palpite::class, 'id_jogo');
    }
}
