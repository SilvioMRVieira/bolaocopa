@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin - Regras de Pontuação</h1>

    @if($regras->isEmpty())
        <p>Nenhuma regra encontrada.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Bolão</th>
                    <th>Nome da Regra</th>
                    <th>Valor de Pontos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($regras as $regra)
                    <tr>
                        <td>{{ $regra->bolao->nome }}</td>
                        <td>{{ $regra->nome_regra }}</td>
                        <td>{{ $regra->valor_pontos }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection