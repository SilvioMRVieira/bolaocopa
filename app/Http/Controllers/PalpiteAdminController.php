<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Palpite;
use App\Models\Jogo;
use App\Models\Regra;

class PalpiteAdminController extends Controller
{
    /**
     * Listar todos os palpites
     */
    public function index()
    {
        $palpites = Palpite::with('usuario', 'jogo')->get();

        return view('admin.palpites.index', compact('palpites'));
    }

    /**
     * Listar todos os jogos (para admin editar)
     */
    public function jogos()
    {
        $jogos = Jogo::with('bolao', 'fase')->get();

        return view('admin.jogos.index', compact('jogos'));
    }

    /**
     * Listar todas as regras de pontuação
     */
    public function regras()
    {
        $regras = Regra::with('bolao')->get();

        return view('admin.regras.index', compact('regras'));
    }
}
