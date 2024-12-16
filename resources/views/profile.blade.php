@extends('layout.main')

@section('title', 'Perfil')


<!-- <link rel="stylesheet" href="/css/agenda.css"> -->

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div id="div-search">
<div id="search-container-agenda" class="col-md-12">
    <h1>Busque sua consulta</h1>
    <form action="{{ route('consultas') }}" method="GET" class="d-flex mb-3 align-items-center">
        <input type="text" id="search" name="search" class="form-control me-2" placeholder="Buscar..."
            value="{{ request('search') }}">
        <button type="submit" class="btn pesquisa" style="width: 40px; height: 40px; padding: 0;">
            <i class="fas fa-search"></i> <!-- Ícone de lupa -->
        </button>
    </form>
</div>
</div>


<div id="consultas-container" class="col-md-12">
    <h1>Consultas recentes</h1>

    @if(request('search'))
        <div class="mb-3">
            <a href="{{ route('consultas') }}" class="badge bg-danger text-decoration-none" style="font-size: 1rem;">
                Limpar Pesquisa
            </a>
        </div>
    @endif

    <div id="consultas-container" class="col-md-12">

        <div id="cards-container" class="row justify-content-start">
            @if (count($consultas) == 0)
                <p>Nenhuma consulta encontrada.</p>
            @else
                            @foreach ($consultas as $consulta)
                                            <div class="card col-md-3" style="margin: 15px;
                                padding: 0; border: 1px solid #ddd; border-radius: 10px; box-shadow:
                                0px 4px 6px rgba(0, 0, 0, 0.1); max-width: 280px;">
                                                <img src="https://imovbsb.com/wp-content/uploads/2017/10/consultas-medicas.webp"
                                                    alt="Imagem de consultas" style="width: 100%; height: 120px;
                                object-fit: cover; border-top-left-radius: 10px;
                                border-top-right-radius: 10px;">
                                                <div class="card-body" style="text-align:
                                left; padding: 15px;">
                                                    <h5 class="card-title" style="font-size:
                                18px; font-weight: bold; margin-bottom: 10px;">
                                                        {{$consulta->title}}
                                                        @if ($consulta->status == '1')
                                                                                    <span class="badge
                                                            text-bg-warning">Pendente</span>
                                                        @elseif ($consulta->status == '2')
                                                                                    <span class="badge
                                                            text-bg-primary">Confirmado</span>
                                                        @elseif ($consulta->status == '3')
                                                                                    <span class="badge
                                                            text-bg-danger">Rejeitado</span>
                                                        @elseif ($consulta->status == '4')
                                                                                    <span class="badge
                                                            text-bg-danger">Cancelado</span>
                                                        @elseif ($consulta->status == '5')
                                                                                    <span class="badge
                                                            text-bg-success">Finalizado</span>
                                                        @elseif ($consulta->status == '6')
                                                                                    <span class="badge
                                                            text-bg-danger">Cliente ausente</span>
                                                        @endif
                                                    </h5>

                                                    <p class="card-name" style="font-size:
                                14px; margin: 5px 0;">{{$consulta->name}} - {{$consulta->idade}}
                                                        Anos</p>
                                                    <p class="card-endereco" style="font-size:
                                14px; color: #666; margin: 5px 0;">{{$consulta->endereco}}</p>
                                                    <p class="card-text" style="font-size:
                                14px; color: #333; margin: 10px 0;">{{$consulta->descricao}}</p>
                                                    <p class="card-date-time" style="font-size: 14px; font-weight: bold; color:
                                #555;">{{\Carbon\Carbon::parse($consulta->data)->format('d/m/Y')}} -
                                                        {{$consulta->horario}}
                                                    </p>

                                                    <a href="{{route(
                                            'exibir_consulta',
                                            $consulta->id
                                        )}}" class="btn" style="background-color: #002244; color: white; padding: 10px 20px; border-radius: 5px; margin-top: 10px;">Visualizar</a>
                                                    @if (Auth::user()->id == $consulta->user_id)
                                                                            <a href="{{route(
                                                                        'editar_consulta',
                                                                        $consulta->id
                                                                    )}}" class="btn" style="background-color: #003366; color:
                                                        white; padding: 10px 20px; border-radius: 5px; margin-top:
                                                        10px;">Editar</a>
                                                    @endif
                                                </div>
                                            </div>
                            @endforeach
            @endif
        </div>
    </div>
    <!-- @foreach ( $consultas as $consulta )
            <p>{{$consulta->title}} -- {{$consulta->name}}</p>
        @endforeach -->

    @endsection