<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso - SimplificaMed</title>
</head>
<body>
<header>
        <h1>Simplifica Med</h1>
        <nav>
            <a href="#">
                <img src="user-icon.svg" alt="Ícone de usuário">
            </a>
        </nav>

        <main>
            <form action="{{url('/profile')}}" method="POST">
                @csrf
                <h2>Entrar</h2>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Insira o e-mail">
                </div>
                <div>
                    <label for="password">Senha</label>
                    <input type="password" id="password" placeholder="Insira a senha">
                    <a href="#">Esqueceu a senha?</a>
                </div> 
                <button type="submit">Entrar</button>
            </form>
        </main>
    </header>
</body>
</html>