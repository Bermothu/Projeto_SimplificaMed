<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="home.css" media="screen" />
    <title>Home - SimplificaMed</title>

    <style>
        /* Reseta os estilos padrão */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
}

/* ------------------------------------------/ CABEÇALHO /------------------------------------------- */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #f5f5f5;
}

.logo {
  display: flex;
  align-items: center;
}

.logo span:first-child {
  background-color: #002244;
  height: 30px;
  width: 30px;
  text-align: center;
  color: #CBD4C2;
  font-size: 24px;
  margin-right: 10px;
}

header .logo h1 {
    font-size: 24px;
    color: #333;
}

.search-container{
  border: none;
  outline: none;
  background: transparent;
}

header input{
  padding: 10px;
  width: 50%;
  border: 1px solid #ddd;
  border-radius: 5px;
  background-color: transparent;
  /* color: #0056b3; cor do botão enviar */
}

nav {
    padding-right:15px;
}

nav ul {
    display: flex;
    list-style: none;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #333;
}

.user-icon {
  font-size: 24px;
  border-radius: 50%;
  background-color: #fff;
  color: #333;
  width: 30px;
  height: 30px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.user-icon a{
    text-decoration: none;
}
.user-icon button{
    background-color: transparent;
    border: none;
}
/* ---------------------------------------/ Sessão Sejam Bem-Vindos /---------------------------------------- */
.banner {
    background-color: #002244;
    color: white;
    padding: 50px 0;
    text-align: center;
    background-image: url('background-banner.jpg'); /* Substitua pela imagem do banner */
    background-size: cover;
}

.banner-content h2 {
    font-size: 36px;
    margin-bottom: 20px;
}

.banner-content p {
    font-size: 18px;
    margin-bottom: 20px;
}

.banner-content button {
    padding: 10px 20px;
    background-color: white;
    color: #002244;
    border: none;
    cursor: pointer;
}
/* --------------------------------------------------------------------------------------------------- */
section.appointments {
    display: flex;
    justify-content: space-around;
    padding: 50px;
}

.appointments-list {
    width: 40%;
}

.appointments-list h3 {
    margin-bottom: 20px;
}

.appointment {
    padding: 15px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    border-radius: 8px;
}

.appointment p {
    margin-bottom: 5px;
}

.appointment span {
    color: red;
}

.calendar {
    width: 40%;
    text-align: center;
}

.calendar h3 {
    margin-bottom: 20px;
}

section.info-clinica {
    padding: 50px;
    background-color: #f5f5f5;
    
}

.info-aling {
  display: flex;
}

.info-item {
    margin-bottom: 10px;
    margin-left: 10;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    overflow: hidden;
    /* background-color: #ccc; */
}

.info-item img {
    width: 150px;
    height: 100px;
    margin-right: 20px;
}

.info-item div {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.info-item h4 {
    margin-bottom: 5px;
}

footer {
    padding: 30px;
    background-color: #002244;
    color: white;
    text-align: center;
}

footer .feedback input {
    padding: 10px;
    width: 80%;
    margin-top: 10px;
    margin-bottom: 15px;
    border: 2px solid #ddd;
    border-radius: 5px;
}


footer .social-links a {
    margin: 0 10px;
    text-decoration: none;
    color: white;
}

.sub-footer {
    padding: 20px;
    text-align: center;
    background-color: #333;
    color: white;
}

footer button {
  background-color: #007bff; /* Azul claro */
  color: #fff; /* Branco */
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

footer button:hover {
  background-color: #0056b3; /* Azul mais escuro ao passar o mouse */
}

/* Property Listings */
.property-listings {
    padding: 40px 20px;
    background-color: #eef;
}

.listing-grid {
    display: flex;
    justify-content: space-between;
}

.listing-item {
    width: 22%;
    background-color: white;
    padding: 15
}

/* darkMode */

.calendar-grid input[type=checkbox]{
    height: 0;
    width: 0;
    visibility: hidden;
  }
  
  .calendar-grid label {
    cursor: pointer;
    text-indent: -9999px;
    width: 52px;
    height: 27px;
    background: grey;
    float: right;
    border-radius: 100px;
    position: relative;
    left: -50px;
  }
  
  .calendar-grid label::after{
    content: '';
    position: absolute;
    top: 3px;
    left: 3px;
    width: 20px;
    height: 20px;
    background-color: white;
    border-radius: 90px;
    transition: 0.3s;
  }
  
  .calendar-grid input:checked + label {
    background-color: rgb(142, 142, 240);
  }
  
  .calendar-grid input:checked + label::after {
    left: calc(100% - 5px);
    transform: translateX(-100%);
  }
  
  .calendar-grid label:active:after {
    width: 45px;
  }

  /* css Calendário */

  .calendar {
    
  --body-color:#FFFCFF ;

  --header-color:#d36c6c;

  --header-button:#92a1d1;

  --color-weekdays: #247BA0;
  
  --box-shadow: #CBD4C2;

  --hover: #e8faed;

  --current-day:#e8f4fa;

  --event-color: #58bae4;

  --modal-event: #e8f4fa;


 --color-day:white;
 
  }

  .calendar-grid {
    
    background-color: var(--body-color);

    }
  
  .calendar-grid button {
    width: 75px;
    cursor: pointer;
    box-shadow: 0px 0px 2px gray;
    border: none;
    outline: none;
    padding: 5px;
    border-radius: 5px;
    color: white;
  }
  
  .calendar-grid #header {
    padding: 10px;
    color: var(--header-color) ;
    font-size: 26px;
    font-family: sans-serif;
    display: flex;
    justify-content: space-between;
  }
  .calendar-grid #header button {
    background-color:var(--header-button);
  }
  .calendar-grid #container {
    width: 770px;
  }
  .calendar-grid  #weekdays {
    width: 100%;
    display: flex;
    color: var(--color-weekdays) ;
  }
  .calendar-grid #weekdays div {
    width: 100px;
    padding: 10px;
  }
  .calendar-grid #calendar {
    width: 100%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
  }
  .calendar-grid .day {
    width: 100px;
    padding: 10px;
    height: 100px;
    cursor: pointer;
    box-sizing: border-box;
    background-color: var(--color-day);
    margin: 5px;
    box-shadow: 0px 0px 3px var(--box-shadow);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border-radius: 15%;
  }
  .calendar-grid .day:hover {
    background-color: var(--hover);
  }
  
  .calendar-grid .day + #currentDay {
    background-color:var(--current-day);
  }
  .calendar-grid .event {
    font-size: 10px;
    padding: 3px;
    background-color: var(--event-color);
    color: white;
    border-radius: 5px;
    max-height: 55px;
    overflow: hidden;
  }
  .calendar-grid .padding {
    cursor: default !important;
    background-color: var(--body-color) !important;
    box-shadow: none !important;
  }
  .calendar-grid #newEventModal, #deleteEventModal {
    display: none;
    z-index: 20;
    padding: 25px;
    background-color: var(--modal-event);
    box-shadow: 0px 0px 3px black;
    border-radius: 5px;
    width: 350px;
    top: 100px;
    left: calc(50% - 175px);
    position: absolute;
    font-family: sans-serif;
  }
  .calendar-grid #eventTitleInput {
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
    margin-bottom: 25px;
    border-radius: 3px;
    outline: none;
    border: none;
    box-shadow: 0px 0px 3px gray;
  }
  .calendar-grid  #eventTitleInput.error {
    border: 2px solid red;
  }
  .calendar-grid #cancelButton, #deleteButton {
    background-color: var(--header-color);
  }
  .calendar-grid #saveButton, #closeButton {
    background-color: var(--header-button);
  }
  .calendar-grid #eventText {
    font-size: 14px;
  }
  .calendar-grid  #modalBackDrop {
    display: none;
    top: 0px;
    left: 0px;
    z-index: 10;
    width: 100vw;
    height: 100vh;
    position: absolute;
    background-color: rgba(0,0,0,0.8);
  }
  
  
    </style>
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
        <button><a href="{{route('perfil_get')}}"> =) </a></button>
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