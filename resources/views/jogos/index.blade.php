@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col">
        <div class="p-4 bg-white rounded-4 shadow-sm">
            <h1 class="h4 mb-1">Jogos do bolão</h1>
            <p class="text-muted mb-0">{{ $bolao->nome }}</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        @forelse($jogos as $jogo)
        <div class="card shadow-sm border-0 rounded-4 mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <h5 class="mb-1">
                            {{ $jogo->timeA->nome ?? 'Time A' }} x {{ $jogo->timeB->nome ?? 'Time B' }}
                        </h5>
                        <div class="text-muted">
                            Fase: {{ $jogo->fase->nome ?? 'Sem fase' }}
                        </div>
                        <div class="text-muted">
                            Data: {{ \Carbon\Carbon::parse($jogo->data_hora)->format('d/m/Y H:i') }}
                        </div>
                    </div>

                    <div class="text-end">
                        <span class="badge bg-secondary">{{ $jogo->status }}</span>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-info">
            Nenhum jogo cadastrado para este bolão.
        </div>
        @endforelse
    </div>
</div>
@endsection