<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="home.css" media="screen" />
    <title>Home - SimplificaMed</title>
</head>
<body>
    <!-- -------------------------------  Cabeçalho  -------------------------------  -->
    <header>
        <div class="logo">
            <span>S</span>
            <h1>Simplifica Med - {{ $nome }}</h1>
        </div>

        <div class="search-container"></div>
            <input type="text" placeholder="Pesquisar">
        </div>

        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Agenda</a></li>
                <li><a href="#">Profissionais</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="{{route('registro')}}">Registrar</a></li>
            </ul> 
        </nav>

        <div class="user-icon">
        <li><a href="{{route('perfil_get')}}">Perfil</a></li>
        </div>
    </header>

    <!-- -------------------------------  Welcome  -------------------------------  -->
    <section class="banner">
        <div class="banner-content">
            <h2>Seja bem-vindo!</h2>
            <p>Precisa agendar sua consulta e não pode ir até o consultório?</p>
            <button>Agende aqui</button>
        </div>
    </section>

    <!-- -------------------------------  Agendamentos  -------------------------------  -->
    <section class="appointments">
        <div class="appointments-list">
            <h3>Agendamentos Realizados</h3>
            <div class="appointment">
                <p>Rafael Torres - Médico</p>
                <p>Segunda, 4 Setembro, 12:00</p>
                <span>Ocupado</span>
            </div>
            <div class="appointment">
                <p>Rafael Torres - Médico</p>
                <p>Segunda, 4 Setembro, 12:00</p>
                <span>Ocupado</span>
            </div>
            <div class="appointment">
                <p>Rafael Torres - Médico</p>
                <p>Segunda, 4 Setembro, 12:00</p>
                <span>Ocupado</span>
            </div>
        </div>

    <!-- -------------------------------  Calendário  -------------------------------  -->
        <div class="calendar">
            <h3>Setembro 2024</h3>

        <!-- dark mode -->
  
        <div class="toggle">
            <input id="switch" type="checkbox" name="theme">
            <label for="switch">Toggle</label>
        </div>


            <div class="calendar-grid">
                <!-- Adicione um calendário interativo ou estático -->
                <div id="container">
                    <div id="header">
                      <div id="monthDisplay"></div>
              
                      <div>
                        <button id="backButton">Voltar</button>
                        <button id="nextButton">Próximo</button>
                      </div>
                        
                    </div>
              
                    <div id="weekdays">
                      <div>Domingo</div>
                      <div>Segunda-feira</div>
                      <div>Terça-feira</div>
                      <div>Quarta-feira</div>
                      <div>Quinta-feira</div>
                      <div>Sexta-feira</div>
                      <div>Sábado</div>
                    </div>
              
              
                    <!-- div dinamic -->
                    <div id="calendar" ></div>
              
                 
                </div>
              
                <div id="newEventModal">
                  <h2>New Evente</h2>
              
                  <input id="eventTitleInput" placeholder="Event Title"/>
              
                  <button id="saveButton"> Salvar</button>
                  <button id="cancelButton">Cancelar</button>
                </div>
              
                <div id="deleteEventModal">
                  <h2>Evento</h2>
              
                  <div id="eventText"></div><br>
              
              
                  <button id="deleteButton">Deletar</button>
                  <button id="closeButton">Fechar</button>
                </div>
              
                <div id="modalBackDrop"></div>
              
              
                <script src="./Calendario-master/scripts/darkMode.js"></script>
                <script src="./scripts/main.js"></script>
                
            </div>
        </div>
    </section>

    <!-- -------------------------------  Sobre Nós  -------------------------------  -->
    <section class="info-clinica">
        <h3>Informações sobre a clínica</h3>
        <div class="info-aling">
            <div class="info-item">
                <img src="clinica.jpg" alt="Imagem da Clínica">
                <div>
                    <h4>Um espaço amplo e agradável.</h4>
                    <p>Lorem ipsum dolor sit amet, aut delectus labore aut quos possimus ut perfere...</p>
                    <span>Set 4, 2022</span>
                </div>
            </div>
            <div class="info-item">
                <img src="clinica.jpg" alt="Imagem da Clínica">
                <div>
                    <h4>Um espaço amplo e agradável.</h4>
                    <p>Lorem ipsum dolor sit amet, aut delectus labore aut quos possimus ut perfere...</p>
                    <span>Set 4, 2022</span>
                </div>
            </div>
        </div>
    </section>

    <!-- -------------------------------  Profissionais  -------------------------------  -->
    <section class="property-listings">
        <h2>Apartments Available For Rent</h2>
        <div class="listing-grid">
            <div class="listing-item featured">
                <img src="apartment1.jpg" alt="Apartment 1">
                <h3>New Luxury Apartment</h3>
                <p>John Smith - Sep 15, 2022</p>
                <p>Breana Mill</p>
                <button>View Property</button>
            </div>
            <div class="listing-item new">
                <img src="apartment2.jpg" alt="Apartment 2">
                <h3>New Luxury Apartment</h3>
                <p>John Smith - Sep 15, 2022</p>
                <p>Breana Mill</p>
                <button>View Property</button>
            </div>
            <div class="listing-item new">
                <img src="apartment3.jpg" alt="Apartment 3">
                <h3>New Luxury Apartment</h3>
                <p>John Smith - Sep 15, 2022</p>
                <p>Breana Mill</p>
                <button>View Property</button>
            </div>
            <div class="listing-item featured">
                <img src="apartment4.jpg" alt="Apartment 4">
                <h3>New Luxury Apartment</h3>
                <p>John Smith - Sep 15, 2022</p>
                <p>Breana Mill</p>
                <button>View Property</button>
            </div>
        </div>
    </section>

    <!-- -------------------------------  Rodapé  -------------------------------  -->
    <footer>
        <div class="feedback">
            <h3>Sugestões ou reclamações</h3>
            <input type="text" placeholder="Envie aqui">
            <button>Enviar</button>
        </div>
        <div class="social-links">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">LinkedIn</a>
            <br>
            <br>
        </div>
        
    </footer>

    <div class="sub-footer">
        <p>&copy; 2024 ABC Real Estate. All rights reserved.</p>
    </div>
</body>
</html>