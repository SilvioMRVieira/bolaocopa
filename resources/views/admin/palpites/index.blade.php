@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin - Palpites</h1>

    @if($palpites->isEmpty())
        <p>Nenhum palpite encontrado.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Jogo</th>
                    <th>Palpite</th>
                    <th>Pontos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($palpites as $palpite)
                    <tr>
                        <td>{{ $palpite->usuario->name }}</td>
                        <td>{{ $palpite->jogo->time_a }} x {{ $palpite->jogo->time_b }}</td>
                        <td>{{ $palpite->gols_palpite_a }} x {{ $palpite->gols_palpite_b }}</td>
                        <td>{{ $palpite->pontos }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection