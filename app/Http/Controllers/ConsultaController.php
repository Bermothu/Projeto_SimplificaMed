<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // importa a biblioteca de query builder do Laravel
use App\Models\Consulta; //CHAMAMOS O MODEL DA NOSSA CONSULTA
use Illuminate\Support\Facades\Auth;

use App\Mail\AdminNotificationMail;
use Illuminate\Support\Facades\Mail;


class ConsultaController extends Controller
{
    public function index() {
        // chama todos os eventos referentes a tabela consultas do nosso banco de dados
        $consultas = Consulta::all();
        return view('profile', compact('consultas'));
    }

    public function create() {
        return view('consulta.consultas');
    }

    public function store(Request $request){
        // validando os dados de forma basica
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'idade' => 'required|integer|min:0',
            'endereco' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data' => 'required|date',
            'horario' => 'required',
        ]);

        // criando um novo registro na tabela 'consultas'
        $consulta = new Consulta([
            'title' => $validatedData['title'],
            'user_id' => Auth::user()->id,
            'idade' => $validatedData['idade'],
            'endereco' => $validatedData['endereco'],
            'descricao' => $validatedData['descricao'],
            'data' => $validatedData['data'],
            'horario' => $validatedData['horario'],
            'status' => 1,
        ]);

        // salvando a consulta no banco de dados
        $consulta->save();

        // Enviar e-mail para o admin
        Mail::to('admin@gmail.com')->send(new AdminNotificationMail($consulta));

        // redirecionar
        return redirect()->route('consultas')->with('success', 'Agendamento realizado com sucesso!');
    }

    public function show($id){
        // Buscar a consulta pelo ID
        $consulta = Consulta::with('user')->findOrFail($id); // Lança um erro 404 se não encontrar

        // Retorna a view com a consulta
        return view('consulta.show', compact('consulta'));
    }

    public function edit($id){
        // Buscar a consulta pelo ID
        $consulta = Consulta::with('user')->findOrFail($id);

        // Retorna a view de edição com a consulta
        return view('consulta.edit', compact('consulta'));
    }

    public function update(Request $request, $id){
        // Validação dos dados
        $request->validate([
            'title' => 'required|string|max:255',
            'idade' => 'required|integer|min:0',
            'endereco' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data' => 'required|date',
        ]);

        // Atualiza a consulta
        $consulta = Consulta::findOrFail($id);
        $consulta->update($request->all());
        // Redireciona com uma mensagem de sucesso
        return redirect()->route('consultas')->with('success', 'Consulta atualizada com sucesso!');
    }


}
