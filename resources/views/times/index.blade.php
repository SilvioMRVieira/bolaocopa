@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Times</h1>
        <a href="{{ route('times.create') }}" class="btn btn-primary">Novo time</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>Escudo</th>
                <th>Nome</th>
                <th>Sigla</th>
                <th>Ativo</th>
                <th class="text-end">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($times as $time)
                <tr>
                    <td>
                        @if($time->escudo)
                            <img src="{{ asset('storage/'.$time->escudo) }}" alt="{{ $time->nome }}" width="32" height="32">
                        @endif
                    </td>
                    <td>{{ $time->nome }}</td>
                    <td>{{ $time->sigla }}</td>
                    <td>{{ $time->ativo ? 'Sim' : 'Não' }}</td>
                    <td class="text-end">
                        <a href="{{ route('times.edit', $time) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('times.destroy', $time) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir este time?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum time cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $times->links() }}
</div>
@endsection