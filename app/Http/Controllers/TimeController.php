<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TimeController extends Controller
{
    public function index()
    {
        $times = Time::orderBy('nome')->paginate(10);
        return view('times.index', compact('times'));
    }

    public function create()
    {
        return view('times.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10|unique:times,sigla',
            'escudo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'ativo' => 'nullable|boolean',
        ]);

        $data['ativo'] = $request->boolean('ativo', true);

        if ($request->hasFile('escudo')) {
            $data['escudo'] = $request->file('escudo')->store('escudos', 'public');
        }

        Time::create($data);

        return redirect()->route('times.index')->with('success', 'Time cadastrado com sucesso.');
    }

    public function show(Time $time)
    {
        return view('times.show', compact('time'));
    }

    public function edit(Time $time)
    {
        return view('times.edit', compact('time'));
    }

    public function update(Request $request, Time $time)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10|unique:times,sigla,' . $time->id,
            'escudo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'ativo' => 'nullable|boolean',
        ]);

        $data['ativo'] = $request->boolean('ativo', true);

        if ($request->hasFile('escudo')) {
            if ($time->escudo) {
                Storage::disk('public')->delete($time->escudo);
            }

            $data['escudo'] = $request->file('escudo')->store('escudos', 'public');
        }

        $time->update($data);

        return redirect()->route('times.index')->with('success', 'Time atualizado com sucesso.');
    }

    public function destroy(Time $time)
    {
        if ($time->escudo) {
            Storage::disk('public')->delete($time->escudo);
        }

        $time->delete();

        return redirect()->route('times.index')->with('success', 'Time excluído com sucesso.');
    }
}