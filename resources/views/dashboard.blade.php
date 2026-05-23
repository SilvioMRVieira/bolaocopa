@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col">
        <div class="p-4 bg-white rounded-4 shadow-sm">
            <h1 class="h3 mb-1">Dashboard</h1>
            <p class="text-muted mb-0">Gerencie seus bolões da Copa do Mundo 2026.</p>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-12">
        <h2 class="h5 mb-3">Bolões disponíveis</h2>
    </div>

    @forelse($boloes as $bolao)
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm h-100 border-0 rounded-4">
            <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="card-title mb-0">{{ $bolao->nome }}</h5>
                    @if($bolao->ativo)
                    <span class="badge bg-success">Ativo</span>
                    @else
                    <span class="badge bg-secondary">Inativo</span>
                    @endif
                </div>

                <p class="card-text text-muted flex-grow-1">
                    {{ $bolao->descricao ?? 'Sem descrição' }}
                </p>

                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('dashboard.jogos', $bolao->id) }}" class="btn btn-primary btn-sm">
                        Ver jogos e palpites
                    </a>

                    @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.times.index') }}" class="btn btn-primary">
                        Gerenciar Times
                    </a>
                    @endif

                    @if(auth()->check() && auth()->user()->is_admin)
                    <a href="#" class="btn btn-outline-secondary btn-sm">
                        Gerenciar
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info">
            Nenhum bolão disponível no momento.
        </div>
    </div>
    @endforelse
</div>

@if(auth()->check() && auth()->user()->is_admin)
<div class="row mt-5">
    <div class="col-12">
        <div class="card border-warning shadow-sm rounded-4">
            <div class="card-body">
                <h2 class="h5">Área administrativa</h2>
                <p class="text-muted mb-3">Acesso às funções de administração do bolão.</p>
                <a href="{{ route('boloes.create') }}" class="btn btn-warning">Criar bolão</a>
                <a href="{{ route('jogos.create') }}" class="btn btn-success">Cadastrar jogo</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection