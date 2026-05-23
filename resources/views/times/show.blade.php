@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $time->nome }}</h1>

    @if($time->escudo)
        <img src="{{ asset('storage/'.$time->escudo) }}" alt="{{ $time->nome }}" width="80" height="80">
    @endif

    <p><strong>Sigla:</strong> {{ $time->sigla }}</p>
    <p><strong>Ativo:</strong> {{ $time->ativo ? 'Sim' : 'Não' }}</p>

    <a href="{{ route('times.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection