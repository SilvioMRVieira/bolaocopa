<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    // Relações
    public function palpites()
    {
        return $this->hasMany(Palpite::class, 'id_usuario');
    }

    public function boloes()
    {
        return $this->hasMany(Bolao::class, 'id_admin');
    }
}