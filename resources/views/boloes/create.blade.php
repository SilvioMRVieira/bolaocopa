@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
                <h1 class="h4 mb-4">Criar Bolão</h1>

                <form method="POST" action="{{ route('boloes.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do bolão</label>
                        <input
                            type="text"
                            class="form-control @error('nome') is-invalid @enderror"
                            id="nome"
                            name="nome"
                            value="{{ old('nome') }}"
                            placeholder="Ex.: Bolão Copa 2026 - Amigos">
                        @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea
                            class="form-control @error('descricao') is-invalid @enderror"
                            id="descricao"
                            name="descricao"
                            rows="4"
                            placeholder="Descreva as regras gerais ou observações">{{ old('descricao') }}</textarea>
                        @error('descricao')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                            Voltar
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Salvar bolão
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection