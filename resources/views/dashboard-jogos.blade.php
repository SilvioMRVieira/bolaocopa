@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col">
        <div class="p-4 bg-white rounded-4 shadow-sm">
            <h1 class="h4 mb-1">{{ $bolao->nome }}</h1>
            <p class="text-muted mb-0">Jogos organizados por fase</p>
        </div>
    </div>
</div>

@foreach($jogos as $fase => $listaJogos)
<div class="card shadow-sm border-0 rounded-4 mb-4">
    <div class="card-header bg-white">
        <h2 class="h5 mb-0">{{ $fase }}</h2>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th></th>
                        <th class="text-center">Palpite</th>
                        <th></th>
                        <th class="ps-5">Data/Hora - Jogo</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listaJogos as $jogo)
                    @php
                    $palpite = $palpites[$jogo->id] ?? null;
                    @endphp

                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                @if($jogo->timeA->escudo)
                                <img src="{{ asset('storage/'.$jogo->timeA->escudo) }}"
                                    alt="{{ $jogo->timeA->nome }}"
                                    width="28"
                                    height="28">
                                @endif
                                <span>{{ $jogo->timeA->nome }}</span>
                            </div>
                        </td>

                        <td class="text-center fw-bold">
                            {{ $palpite ? $palpite->gols_palpite_a.' x '.$palpite->gols_palpite_b : 'VS' }}
                        </td>

                        <td class="text-end">
                            <div class="d-flex align-items-center justify-content-end gap-2">
                                <span>{{ $jogo->timeB->nome }}</span>
                                @if($jogo->timeB->escudo)
                                <img src="{{ asset('storage/'.$jogo->timeB->escudo) }}"
                                    alt="{{ $jogo->timeB->nome }}"
                                    width="28"
                                    height="28">
                                @endif
                            </div>
                        </td>

                        <td class="ps-5">{{ \Carbon\Carbon::parse($jogo->data_hora)->format('d/m/Y H:i') }}</td>

                        <td class="text-center">
                            <a href="{{ route('palpites.edit', [$bolao->id, $jogo->id]) }}"
                                class="btn btn-sm {{ $palpite ? 'btn-warning' : 'btn-primary' }}">
                                {{ $palpite ? 'Editar palpite' : 'Fazer palpite' }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endforeach
@endsection