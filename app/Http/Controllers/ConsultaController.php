<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Consulta; //CHAMAMOS O MODEL DA NOSSA CONSULTA
use Illuminate\Support\Facades\Auth;

use App\Mail\AdminNotificationMail;
use Illuminate\Support\Facades\Mail;


class ConsultaController extends Controller
{
    public function index(){
        // Verifica se o usuário é admin
        if (Auth::user()->permission_level == 1) {
            // Pegar todas as consultas para admin
            $consultas = Consulta::whereDate('data', now())
            ->orderBy('status')
            ->with('user')->get();
        } else {
            // Pegar apenas as consultas do usuário normal
            $consultas = Consulta::whereDate('data', now())
                ->where('user_id', Auth::id())
                ->orderBy('status') // Adiciona a condição para pegar apenas as consultas do usuário logado
                ->with('user')->get();
        }

        return view('welcome', compact('consultas'));
    }

    public function minhasConsultas() {

        if (Auth::user()->permission_level == 1) {
            // Lista as consultas de todos os usuarios
            $consultas = Consulta::all();
            return view('profile', compact('consultas'));
        }else{
            // Lista as consultas do usuário logado
            $consultas = Consulta::all()->where('user_id', Auth::id());
            return view('profile', compact('consultas'));
        }
    }

    public function getConsultasByDate($date){
        // Verifica se o usuário é admin
        if (Auth::user()->permission_level == 1) {
            // Busca todas as consultas para admin
            $consultas = Consulta::whereDate('data', $date)->with('user')->get();
        } else {
            // Busca apenas as consultas do usuário normal
            $consultas = Consulta::whereDate('data', $date)
                ->where('user_id', Auth::id()) // Adiciona a condição para pegar apenas as consultas do usuário logado
                ->with('user')->get();
        }

        // Verificar se a coleção está vazia
        if ($consultas->isEmpty()) {
            return response()->json(['html' => '<p>Nenhuma consulta encontrada para essa data.</p>']);
        }

        // Renderizar a lista de consultas
        $view = view('consultas-list', compact('consultas'))->render();
        return response()->json(['html' => $view]);
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
        Mail::to('emily.nogueira@escolar.ifrn.edu.br')->send(new AdminNotificationMail($consulta));

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
