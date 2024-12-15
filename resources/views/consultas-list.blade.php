@if($consultas->count() === 0)
    <p>Nenhuma consulta encontrada para essa data.</p>
@else
    <ul class="list-group">
        @foreach($consultas as $consulta)
            <li class="list-group-item">
                <div class="d-flex flex-column align-items-start">
                    <strong>{{ $consulta->title }}</strong>
                    <span>{{ $consulta->horario }}</span>
                    
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
                    @elseif ($consulta->status == '6')
                        <span class="badge text-bg-danger">Cliente ausente</span>
                    @endif

                    <span class="truncate mt-2">{{ $consulta->descricao }}</span>
                    <small class="text-muted">{{ $consulta->user->name }}</small>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('exibir_consulta', $consulta->id) }}" class="btn btn-primary btn-visualizar">Visualizar</a>
                </div>
            </li>
        @endforeach
    </ul>
@endif
