<?php

namespace App\Http\Controllers;

use App\Models\Bolao;
use App\Models\Jogo;
use App\Models\Palpite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PalpiteController extends Controller
{
    public function index($id_bolao)
    {
        $bolao = Bolao::findOrFail($id_bolao);

        $jogos = Jogo::with(['fase', 'timeA', 'timeB'])
            ->where('id_bolao', $id_bolao)
            ->orderBy('data_hora')
            ->get();

        return view('palpites.index', compact('bolao', 'jogos'));
    }

    public function edit($id_bolao, $id_jogo)
    {
        $bolao = Bolao::findOrFail($id_bolao);

        $jogo = Jogo::with(['fase', 'timeA', 'timeB'])
            ->where('id_bolao', $id_bolao)
            ->findOrFail($id_jogo);

        $palpite = Palpite::where('id_usuario', auth()->id())
            ->where('id_jogo', $id_jogo)
            ->first();

        return view('palpites.edit', compact('bolao', 'jogo', 'palpite'));
    }

    public function store(Request $request, $bolao, $jogo)
    {
        $request->validate([
            'gols_palpite_a' => 'required|integer|min:0',
            'gols_palpite_b' => 'required|integer|min:0',
        ]);

        Palpite::updateOrCreate(
            [
                'id_usuario' => auth()->id(),
                'id_jogo' => $jogo,
            ],
            [
                'gols_palpite_a' => $request->gols_palpite_a,
                'gols_palpite_b' => $request->gols_palpite_b,
            ]
        );

        return redirect()->route('dashboard.jogos', $bolao)->with('success', 'Palpite salvo com sucesso.');
    }
}
