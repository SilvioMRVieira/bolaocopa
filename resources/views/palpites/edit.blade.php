@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
                <h1 class="h4 mb-1">Fazer palpite</h1>
                <p class="text-muted mb-4">
                    {{ $bolao->nome }} • {{ $jogo->fase->nome ?? 'Sem fase' }}
                </p>

                <div class="mb-4">
                    <strong>{{ $jogo->timeA->nome }} x {{ $jogo->timeB->nome }}</strong><br>
                    <span class="text-muted">
                        {{ \Carbon\Carbon::parse($jogo->data_hora)->format('d/m/Y H:i') }}
                    </span>
                </div>

                <form method="POST" action="{{ route('palpites.store', ['bolao' => $bolao->id, 'jogo' => $jogo->id]) }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ $jogo->timeA->nome }}</label>
                            <input type="number"
                                min="0"
                                class="form-control @error('gols_palpite_a') is-invalid @enderror"
                                name="gols_palpite_a"
                                value="{{ old('gols_palpite_a', $palpite->gols_palpite_a ?? '') }}">
                            @error('gols_palpite_a')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ $jogo->timeB->nome }}</label>
                            <input type="number"
                                min="0"
                                class="form-control @error('gols_palpite_b') is-invalid @enderror"
                                name="gols_palpite_b"
                                value="{{ old('gols_palpite_b', $palpite->gols_palpite_b ?? '') }}">
                            @error('gols_palpite_b')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('dashboard.jogos', $bolao->id) }}" class="btn btn-outline-secondary">
                            Voltar
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Salvar palpite
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection