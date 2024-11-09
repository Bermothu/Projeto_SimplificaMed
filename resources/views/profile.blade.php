@extends('layout.main')

@section('title', 'Perfil')


<link rel="stylesheet" href="/css/agenda.css">

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div id="search-container-agenda" class="col-md-12">
        <h1>Busque sua consulta</h1>
        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Buscar...">
        </form>
    </div>

    <div id="consultas-container" class="col-md-12">
        <h1>Consultas recentes</h1>

        <div id="cards-container" class="row">
            @if ( count( $consultas ) == 0 )
                <p>Nenhuma consulta encontrada.</p>
            @else
                    @foreach ( $consultas as $consulta )
                        <div class="card col-md-3">
                            <img src="https://via.placeholder.com/150" alt="Imagem de consultas">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{$consulta->title}}
                                    @if ($consulta->status == '1')
                                        <span class="badge text-bg-warning">Pendente</span>
                                    @elseif ($consulta->status == '2')
                                        <span class="badge text-bg-primary">Confirmado</span>
                                    @elseif ($consulta->status == '3')
                                        <span class="badge text-bg-danger">Rejeitado</span>
                                    @elseif ($consulta->status == '4')
                                        <span class="badge text-bg-danger">Cancelado</span>
                                    @elseif ($consulta->status == '5')
                                        <span class="badge text-bg-success">Finalizado</span>
                                    @endif
                                </h5>
                                
                                <p class="card-name">{{$consulta->name}} - {{$consulta->idade}} Anos</p>
                                <p class="card-endereco">{{$consulta->endereco}}</p>
                                <p class="card-text">{{$consulta->descricao}}</p>
                                <p class="card-date-time">{{\Carbon\Carbon::parse($consulta->data)->format('d/m/Y')}} ---------- {{$consulta->horario}}</p>

                                <a href="{{route('exibir_consulta', $consulta->id)}}" class="btn btn-primary">Visualizar</a>
                                <a href="{{route('editar_consulta', $consulta->id)}}" class="btn btn-secondary">Editar</a>
                                
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