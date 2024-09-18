<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginUser;

// Precisamos incluir o import Request para vincular o objeto request a requisição
// Permite que o framework facilite a manipulação dessas informações coletados por post
use Illuminate\Http\Request;

// Toda rota é definida por um caminho e uma ação
// Essa é a nossa rota padrão do sistema
Route::get('/', function (Request $request) {
    // $nome = $request->post('name');
    $nome = "Usuário";
    return view('welcome', ['nome' => $nome]);
})->name('home');

// Rota utilizada na página home para se registrar no site
Route::get('/register', function () {
    return view('register');
})->name('registro');

// Rota utilizada na página register para acessar o perfil do usuário após o cadastro
// Rota utilizada na página login para acessar o perfil do usuário
// Passamos o padrão de chamada do controller juntamente com o 'nome' da função que queremos utilizar
Route::post('/profile', [LoginUser::class, 'login' ])->name('perfil');

// Rota para acessar perfil por metodo GET
Route::get('/profile', function () {
    return view('profile');
})->name('perfil_get');

// Rota utilizada na página register para realizar o login do usuário
Route::get('/login', function () {
    return view('login');
})->name('acessar');

// Passando rotas com parâmetros (passamos no caminho por chaves e parametramos na função)
Route::get('/profile/{id}', function ($id) {
    return ("Mostrar usuário " . $id);
});

