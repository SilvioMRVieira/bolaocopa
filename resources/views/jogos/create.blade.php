@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
                <h1 class="h4 mb-4">Cadastrar Jogo</h1>

                <form method="POST" action="{{ route('jogos.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Bolão</label>
                        <select name="id_bolao" class="form-select @error('id_bolao') is-invalid @enderror">
                            <option value="">Selecione</option>
                            @foreach($boloes as $bolao)
                            <option value="{{ $bolao->id }}" @selected(old('id_bolao')==$bolao->id)>
                                {{ $bolao->nome }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_bolao')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fase</label>
                        <select name="id_fase" class="form-select @error('id_fase') is-invalid @enderror">
                            <option value="">Selecione</option>
                            @foreach($fases as $fase)
                            <option value="{{ $fase->id }}" @selected(old('id_fase')==$fase->id)>
                                {{ $fase->nome }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_fase')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Time A</label>
                        <select name="id_time_a" class="form-select @error('id_time_a') is-invalid @enderror">
                            <option value="">Selecione</option>
                            @foreach($times as $time)
                            <option value="{{ $time->id }}" @selected(old('id_time_a')==$time->id)>
                                {{ $time->nome }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_time_a')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Time B</label>
                        <select name="id_time_b" class="form-select @error('id_time_b') is-invalid @enderror">
                            <option value="">Selecione</option>
                            @foreach($times as $time)
                            <option value="{{ $time->id }}" @selected(old('id_time_b')==$time->id)>
                                {{ $time->nome }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_time_b')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data e hora</label>
                        <input type="datetime-local" name="data_hora" class="form-control @error('data_hora') is-invalid @enderror" value="{{ old('data_hora') }}">
                        @error('data_hora')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Voltar</a>
                        <button type="submit" class="btn btn-primary">Salvar jogo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection