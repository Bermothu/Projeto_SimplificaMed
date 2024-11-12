<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProfissionalController;

// Precisamos incluir o import Request para vincular o objeto request a requisição
// Permite que o framework facilite a manipulação dessas informações coletados por post 
use Illuminate\Http\Request;

// Toda rota é definida por um caminho e uma ação
Route::get('/', function () {
    return redirect('login');
})->name('index');

Route::post('/login', [LoginController::class, 'store' ])->name('perfil_login');
Route::get('/login', [LoginController::class, 'create'])->name('login');

// Rota utilizada na página home para se registrar no site
Route::get('/register', [RegisterController::class, 'create'])->name('registro');
Route::post('/register', [RegisterController::class, 'store'])->name('perfil_register');


// Rotas que só podem ser acessadas logado
Route::middleware('auth')->group(function () {
    Route::get('/home', [ConsultaController::class, 'index'])->name('home');
    Route::get('/consultas/{date}', [ConsultaController::class, 'getConsultasByDate']);
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get(uri: '/perfil', action: [UserController::class, 'create'])->name('profile');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');

    // Crud de consultas
    Route::get('/consultas', [ConsultaController::class, 'minhasConsultas'])->name('consultas');
    Route::get('/agendamento', [ConsultaController::class, 'create'])->name('agenda');
    Route::post('/agendamento', [ConsultaController::class, 'store'])->name('agenda');
    Route::get('/consulta/{id}', [ConsultaController::class, 'show'])->name('exibir_consulta');
    Route::get('/consulta/editar/{id}', [ConsultaController::class, 'edit'])->name('editar_consulta');
    Route::post('/consulta/editar/{id}', [ConsultaController::class, 'update'])->name('update_consulta');

    // Rotas de profissionais
    Route::get('/profissionais', [ProfissionalController::class, 'index'])->name('profissionals');
    Route::get('/profissionais/cadastrar', [ProfissionalController::class, 'create'])->name('cadastrar_profissional');
    Route::post('/profissionais/cadastrar', [ProfissionalController::class, 'store'])->name('cadastrar_profissional');
    Route::get('/profissionais/{id}', [ProfissionalController::class, 'show'])->name('exibir_profissional');
    Route::delete('/profissionais/{id}', [ProfissionalController::class, 'destroy'])->name('deletar_profissional');

});


