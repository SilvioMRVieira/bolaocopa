<?php

namespace App\Http\Controllers;

use App\Models\Bolao;
use App\Models\Fase;
use App\Models\Jogo;
use Illuminate\Http\Request;
use App\Models\Time;

class JogoController extends Controller
{
    public function index($id_bolao)
    {
        $bolao = Bolao::findOrFail($id_bolao);

        $jogos = Jogo::with(['fase', 'timeA', 'timeB'])
            ->where('id_bolao', $id_bolao)
            ->orderBy('data_hora')
            ->get();

        return view('jogos.index', compact('bolao', 'jogos'));
    }

    public function create()
    {
        $boloes = Bolao::where('ativo', true)->orderBy('nome')->get();
        $fases = Fase::orderBy('ordem')->get();
        $times = Time::orderBy('nome')->get();

        return view('jogos.create', compact('boloes', 'fases', 'times'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bolao' => 'required|exists:boloes,id',
            'id_fase' => 'required|exists:fases,id',
            'id_time_a' => 'required|exists:times,id|different:id_time_b',
            'id_time_b' => 'required|exists:times,id',
            'data_hora' => 'required|date',
        ]);

        Jogo::create([
            'id_bolao' => $request->id_bolao,
            'id_fase' => $request->id_fase,
            'id_time_a' => $request->id_time_a,
            'id_time_b' => $request->id_time_b,
            'data_hora' => $request->data_hora,
            'status' => 'agendado',
        ]);

        return redirect()->route('dashboard')->with('success', 'Jogo criado com sucesso.');
    }
}
