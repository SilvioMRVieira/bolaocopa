@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col">
        <div class="p-4 bg-white rounded-4 shadow-sm">
            <h1 class="h4 mb-1">Palpites</h1>
            <p class="text-muted mb-0">{{ $bolao->nome }}</p>
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row justify-content-center">
    <div class="col-lg-10">
        <form method="POST" action="{{ route('palpites.store', $bolao->id) }}">
            @csrf

            @forelse($jogos as $jogo)
            <div class="card shadow-sm border-0 rounded-4 mb-3">
                <div class="card-body">
                    <div class="mb-2 text-muted">
                        {{ $jogo->fase->nome ?? 'Sem fase' }} • {{ \Carbon\Carbon::parse($jogo->data_hora)->format('d/m/Y H:i') }}
                    </div>

                    <h5 class="mb-3">{{ $jogo->timeA->nome }} x {{ $jogo->timeB->nome }}</h5>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">{{ $jogo->time_a }}</label>
                            <input type="number"
                                min="0"
                                name="palpites[{{ $jogo->id }}][time_a]"
                                class="form-control"
                                value="{{ old('palpites.'.$jogo->id.'.time_a') }}">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">{{ $jogo->time_b }}</label>
                            <input type="number"
                                min="0"
                                name="palpites[{{ $jogo->id }}][time_b]"
                                class="form-control"
                                value="{{ old('palpites.'.$jogo->id.'.time_b') }}">
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-info">Nenhum jogo disponível para palpites.</div>
            @endforelse

            <div class="d-flex justify-content-between">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar palpites</button>
            </div>
        </form>
    </div>
</div>
@endsection