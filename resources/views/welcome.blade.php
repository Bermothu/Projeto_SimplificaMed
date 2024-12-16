@extends('layout.main')

@section('title', 'Home - SimplificaMed')

@section('content')

    <!-- Sucess login -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


    <!-- End tag -->


    <!-- -------------------------------  Welcome  -------------------------------  -->
    <section class="banner">
    <div class="banner-content">
        <h2>Seja bem-vindo!</h2>
        <p>Precisa agendar sua consulta e não pode ir até o consultório?</p>
        <div class="button-group">
            <a href="{{route('agenda')}}" class="btn btn-primary">Agende Aqui</a>
            <!-- <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-secondary">Logout</button>
            </form> -->
        </div>
    </div>
</section>

<!-- ------------------------------- Agendamentos ------------------------------- -->
<section class="appointments">
    <div class="container">
        <div class="row">
            <!-- Consultas do dia -->
            <div class="col-md-12 appointment-item">
                <h3>Consultas do dia</h3>
                <div id="consultas-list">
                    @include('consultas-list', ['consultas' => $consultas])
                </div>
            </div>

            @if (Auth::user()->permission_level == 1 || Auth::user()->permission_level == 2)
                <!-- Selecionar data -->
                <div class="col-md-12 appointment-item">
                    <h3>Selecione uma data</h3>
                    <div class="date-picker-container">
                        <input type="date" id="calendar" class="form-control" value="{{ now()->toDateString() }}">
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>


    <!-- ------------------------------- Sobre Nós ------------------------------- -->
    <div class="page-sobre">
    <section class="info-compromisso">
        <h4>Nosso compromisso com a saúde</h4>
        <p>A clínica oferece um ambiente moderno e acolhedor, onde o paciente recebe atendimento de excelência. Nosso compromisso é com a saúde e o bem-estar de todos, proporcionando um atendimento humanizado e profissional.</p>
    </section>
    <br>
    
    <section class="info-clinica">
        <div class="info-cards">
            <div class="info-item">
            <img src="https://maxmaq.com.br/wp-content/uploads/2020/02/imagem-montar-clinica-1024x539-1.png" alt="Imagem da Clínica">
                <div>
                    <h4>Um espaço amplo e agradável.</h4>
                    <p>Lorem ipsum dolor sit amet, aut delectus labore aut quos possimus ut perfere...</p>
                    <span>Set 4, 2022</span>
                </div>
            </div>
            <div class="info-item">
            <img src="https://medicinasa.com.br/wp-content/uploads/2021/03/medicos-networking-medica2.jpg" alt="Imagem da Clínica">
                <div>
                    <h4>Ambiente acolhedor e moderno.</h4>
                    <p>Lorem ipsum dolor sit amet, aut delectus labore aut quos possimus ut perfere...</p>
                    <span>Set 4, 2022</span>
                </div>
            </div>
            <div class="info-item">
            <img src="https://ecomax-cdi.com.br/wp-content/uploads/2024/09/9.389-Imagem-por-Difusao-DWI-Destacada_APROVADO-1170x630.jpg" alt="Imagem da Clínica">
            <div>
                <h4>Equipamentos modernos</h4>
                <p>Equipamentos de última geração para diagnóstico e tratamento de diversas condições.</p>
            </div>
        </div>
        <div class="info-item">
        <img src="https://codigomed.com/wp-content/uploads/2018/09/Como-otimizar-o-tempo-de-atendimento-em-sua-cl%C3%ADnica.jpg" alt="Imagem da Clínica">
        <div>
                <h4>Ambiente acolhedor</h4>
                <p>Um ambiente confortável e seguro para os pacientes, com foco no bem-estar de todos.</p>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('calendar').addEventListener('change', function() {
            const selectedDate = this.value; // Data no formato YYYY-MM-DD

            fetch(`/consultas/${selectedDate}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na requisição: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.html) {
                        document.getElementById('consultas-list').innerHTML = data.html;
                    } else {
                        document.getElementById('consultas-list').innerHTML = '<p>Erro ao carregar consultas.</p>';
                    }
                })
                .catch(error => {
                    console.error(error);
                    document.getElementById('consultas-list').innerHTML = '<p>Erro ao carregar consultas.</p>';
                });
        });
    </script>
    </div>

@endsection