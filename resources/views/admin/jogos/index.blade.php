@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin - Jogos</h1>

    @if($jogos->isEmpty())
        <p>Nenhum jogo encontrado.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Bolão</th>
                    <th>Fase</th>
                    <th>Time A</th>
                    <th>Time B</th>
                    <th>Data/Hora</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jogos as $jogo)
                    <tr>
                        <td>{{ $jogo->bolao->nome }}</td>
                        <td>{{ $jogo->fase->nome }}</td>
                        <td>{{ $jogo->time_a }}</td>
                        <td>{{ $jogo->time_b }}</td>
                        <td>{{ $jogo->data_hora }}</td>
                        <td>{{ $jogo->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection