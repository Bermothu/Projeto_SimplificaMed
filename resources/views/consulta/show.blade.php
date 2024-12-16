@extends('layout.main')

@section('title', 'Detalhes da Consulta')

@section('content')

<div class="container mt-5 mb-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h2>Detalhes da Consulta</h2>

    <div class="card-profile">
        <div class="card-header">
            <h3>{{ $consulta->title }}</h3>
        </div>
        <div class="card-body">
            <!-- Detalhes da consulta -->
            <p><strong>Nome do Paciente:</strong> {{ $consulta->user->name }}</p>
            <p><strong>Idade:</strong> {{ $consulta->idade }} anos</p>
            <p><strong>Endereço:</strong> 
            @if(!empty($consulta->user->endereco))
                {{ $consulta->user->endereco }}
            @else
                Endereço de usuário não cadastrado
            @endif
            </p>
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
                @elseif ($consulta->status == 6)
                    <span class="badge text-bg-danger">Cliente ausente</span>
                @endif
            </p>

            <p><strong>Profissional Associado: </strong>
                @if($consulta->profissionalConsulta)
                    {{ $consulta->profissionalConsulta->profissional->name }} - {{ $consulta->profissionalConsulta->profissional->tipo }}
                @else
                    Nenhum profissional associado.
                @endif
            </p>
        </div>
    </div>

    <!-- Botões Voltar e Excluir alinhados -->
    <div class="d-flex align-items-center mt-3">
        <a href="{{ route('consultas') }}" class="btn btn-light-blue me-2">Voltar</a>
        @if ((Auth::user()->permission_level == 0 || Auth::user()->permission_level == 1 || Auth::user()->permission_level == 2) && ($consulta->status == 4 || $consulta->status == 3))
            <form action="{{ route('consultas.delete', $consulta->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta consulta?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-red">Excluir</button>
            </form>
        @endif

        <!-- Rejeitar um consulta -->
        @if(Auth::user()->permission_level == 1 && $consulta->status == 1 && empty($consulta->profissionalConsulta->consulta_id))
                <form action="{{ route('rejeitar_consulta', $consulta->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-red">Rejeitar Consulta</button>
                </form>
            @endif
    </div>

            
    <!-- Ações se o usuário for admin -->
    @if (Auth::user()->permission_level == 1)



    <!-- Se a consulta estiver no status 5 (finalizado) nenhum botão aparece mais -->
        @if ($consulta->profissionalConsulta && $consulta->profissionalConsulta->status != 5)

            @if ($consulta->profissionalConsulta && $consulta->profissionalConsulta->status == 2)
                <!-- Botão para finalizar consulta -->
                <form action="{{ route('finalizar_consulta', $consulta->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-success mt-3">Finalizar Consulta</button>
                </form>

                <!-- Usuário não apareceu a consulta -->
                <form action="{{ route('usuario_ausente', $consulta->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-3">Cliente não compareceu</button>
                </form>
            @endif
        @else
            
            

        @endif
        
    <!-- Ações se o usuário for comum -->
    @elseif (Auth::user()->permission_level == 0)
        @if($consulta->status != 4 && empty($consulta->profissionalConsulta->consulta_id) && $consulta->status != 3)
            <form action="{{ route('cancelar_consulta', $consulta->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-red mt-3">Cancelar Consulta</button>
            </form>
        @endif
    @else
        @if ($consulta->profissionalConsulta && $consulta->profissionalConsulta->status == 1)
            <!-- Botão para confirmar a consulta -->
                <form action="{{ route('confirmar_consulta', $consulta->profissionalConsulta->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-green mt-3">Aceitar Consulta</button>
                </form>
                <form action="{{ route('rejeitar_consulta', $consulta->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-red mt-3">Rejeitar Consulta</button>
                </form>
            @endif
    @endif

</div>

@endsection
