@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Time</h1>

    <form action="{{ route('times.update', $time) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $time->nome) }}">
            @error('nome')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Sigla</label>
            <input type="text" name="sigla" class="form-control" value="{{ old('sigla', $time->sigla) }}">
            @error('sigla')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Escudo atual</label><br>
            @if($time->escudo)
                <img src="{{ asset('storage/'.$time->escudo) }}" alt="{{ $time->nome }}" width="48" height="48">
            @else
                <span>Sem escudo</span>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Novo escudo</label>
            <input type="file" name="escudo" class="form-control">
            @error('escudo')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="ativo" value="1" class="form-check-input" id="ativo" {{ $time->ativo ? 'checked' : '' }}>
            <label for="ativo" class="form-check-label">Ativo</label>
        </div>

        <button class="btn btn-primary">Atualizar</button>
        <a href="{{ route('times.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection