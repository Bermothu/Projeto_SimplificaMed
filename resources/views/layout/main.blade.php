
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="home.css" media="screen" />
    <link rel="stylesheet" href="/css/welcome.css">

    <!-- Fontes do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>@yield('title')</title>

</head>

<body>
    <!-- -------------------------------  Cabeçalho  -------------------------------  -->
    <header>
        <div class="logo">
            <span>S</span>
            <h1>Simplifica Med</h1>
        </div>
        @if(!empty(Auth::user()))
            <div class="search-container"></div>
                <input type="text" placeholder="Pesquisar">
            </div>

            <nav>
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{ route('agenda') }}">Agenda</a></li>
                    @if(Auth::user()->permission_level == 1)
                        <li><a href="{{route('profissionals')}}">Profissionais</a></li>  
                    @endif
                    <li><a href="{{route('consultas')}}">Consultas</a></li>
                    <li><a href="{{route('registro')}}" class="hover">Registrar</a></li>
                </ul> 
            </nav>

            

            <div class="user-icon">
                <button>
                    <a href="{{route('profile')}}"> =) </a>
                </button>
            </div>
        @endif
    </header>

    @yield('content')

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