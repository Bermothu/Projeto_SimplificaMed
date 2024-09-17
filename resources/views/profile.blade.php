<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - SimplificaMed</title>
    <!-- Estilo do perfil do usuário -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
        .profile-header h1 {
            font-size: 24px;
            margin: 10px 0;
        }
        .profile-header p {
            color: #777;
        }
        .profile-content {
            text-align: left;
        }
        .profile-content h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .profile-content p {
            line-height: 1.6;
        }
        .contact-info {
            margin-top: 20px;
        }
        .contact-info h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .contact-info ul {
            list-style-type: none;
            padding: 0;
        }
        .contact-info ul li {
            margin-bottom: 10px;
            color: #555;
        }
        .contact-info ul li span {
            font-weight: bold;
        }
    </style>
</head>

<body>
<div class="profile-container">
        <div class="profile-header">
            <img src="https://via.placeholder.com/150" alt="Foto do Perfil">
            <h1>João Silva</h1>
            <p>Desenvolvedor Web</p>
        </div>
        <div class="profile-content">
            <h2>Sobre mim</h2>
            <p>Sou um desenvolvedor web apaixonado por criar interfaces modernas e funcionais. Tenho experiência com HTML, CSS, JavaScript e frameworks como React e Laravel. Adoro aprender novas tecnologias e enfrentar desafios.</p>
        </div>
        <div class="contact-info">
            <h3>Informações de Contato</h3>
            <ul>
                <li><span>Email:</span> joao.silva@email.com</li>
                <li><span>Telefone:</span> (11) 98765-4321</li>
                <li><span>Localização:</span> São Paulo, SP, Brasil</li>
            </ul>
        </div>
        <button  type="submit"><a href="{{route('registro')}}">Voltar para registro</a></button>
        <br>
        <br>
        <button  type="submit"><a href="{{route('home')}}">Voltar para a página home</a></button>
    </div>
</body>
</html>