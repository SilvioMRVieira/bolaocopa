<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = [
        'nome',
        'sigla',
        'escudo',
        'ativo',
    ];

     protected $casts = [
        'ativo' => 'boolean',
    ];
}