@extends('layout.main')

@section('title', 'Detalhes da Consulta')

@section('content')

<div class="container mt-5">
    <h2>Detalhes da Consulta</h2>

    <div class="card">
        <div class="card-header">
            <h3>{{ $consulta->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Nome do Paciente:</strong> {{ $consulta->user->name }}</p>
            <p><strong>Idade:</strong> {{ $consulta->idade }} anos</p>
            <p><strong>Endereço:</strong> {{ $consulta->user->endereco }}</p>
            <p><strong>Descrição:</strong> {{ $consulta->descricao }}</p>
            <p><strong>Data da Consulta:</strong> {{ \Carbon\Carbon::parse($consulta->data)->format('d/m/Y')}}</p>
            <p><strong>Horário da Consulta:</strong> {{ $consulta->horario }}</p>
            <p><strong>Status:</strong>
                @if ($consulta->status == 1)
                    <span class="badge text-bg-warning">Pendente</span>
                @elseif ($consulta->status == 2)
                    <span class="badge text-bg-primary">Confirmado</span>
                @elseif ($consulta->status == 3)
                    <span class="badge text-bg-danger">Rejeitado</span>
                @elseif ($consulta->status == 4)
                    <span class="badge text-bg-danger">Cancelado</span>
                @elseif ($consulta->status == 5)
                    <span class="badge text-bg-success">Finalizado</span>
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('consultas') }}" class="btn btn-primary mt-3">Voltar</a>
</div>

@endsection
