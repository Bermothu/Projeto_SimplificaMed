<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - SimplificaMed</title>
</head>
<body>
    <header>
            <h1>Pagina de  Cadastro</h1>
            <form action="{{route('perfil')}}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Nome">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Senha">
                <input type="password" name="password_confirmation" placeholder="Confirme a Senha">
                <button type="submit">Cadastrar</button>
            </form>
            <a href="{{route('acessar')}}">Já tem uma conta? Faça login!</a>
    </header>
</body>
</html>