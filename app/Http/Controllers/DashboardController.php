<?php

namespace App\Http\Controllers;

use App\Models\Bolao;
use App\Models\Jogo;
use App\Models\Palpite;

class DashboardController extends Controller
{
    public function index()
    {
        $boloes = Bolao::where('ativo', true)->latest()->get();

        return view('dashboard', compact('boloes'));
    }

    public function jogosDoBolao($id_bolao)
    {
        $bolao = Bolao::findOrFail($id_bolao);

        $jogosPlano = Jogo::with(['fase', 'timeA', 'timeB'])
            ->where('id_bolao', $id_bolao)
            ->orderBy('data_hora')
            ->get();

        $palpites = Palpite::where('id_usuario', auth()->id())
            ->whereIn('id_jogo', $jogosPlano->pluck('id'))
            ->get()
            ->keyBy('id_jogo');

        $jogos = $jogosPlano->groupBy(fn($jogo) => $jogo->fase->nome ?? 'Sem fase');

        return view('dashboard-jogos', compact('bolao', 'jogos', 'palpites'));
    }
}
