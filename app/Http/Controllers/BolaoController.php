<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bolao;
use Illuminate\Support\Facades\Auth;

class BolaoController extends Controller
{
    /**
     * Listar todos os bolões (para o usuário ver)
     */
    public function index()
    {
        $boloes = Bolao::with('fases')->get();

        return view('boloes.index', compact('boloes'));
    }

    public function create()
    {
        return view('boloes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        Bolao::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'id_admin' => Auth::id(),
            'ativo' => true,
        ]);

        return redirect()->route('dashboard')->with('success', 'Bolão criado com sucesso.');
    }
}
