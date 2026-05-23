@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bolões da Copa 2026</h1>

    @if($boloes->isEmpty())
        <p>Nenhum bolão encontrado.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Fases</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($boloes as $bolao)
                    <tr>
                        <td>{{ $bolao->nome }}</td>
                        <td>{{ $bolao->descricao }}</td>
                        <td>{{ $bolao->fases->count() }} fases</td>
                        <td>
                            <a href="{{ route('bolao.jogos', $bolao->id) }}" class="btn btn-primary">
                                Ver Jogos
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection