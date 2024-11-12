<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profissional;
use Illuminate\Support\Facades\Validator;

use App\Mail\AdminNotificationMail;
use Illuminate\Support\Facades\Mail;

class ProfissionalController extends Controller
{
    public function index(){
        $profissionals = Profissional::all();
        return view('profissionals.listagem', compact('profissionals'));
    }

    public function create(){
        return view('profissionals.create');
    }

    public function store(Request $request){
        // validando os dados de forma basica
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'tipo' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        // criando um novo registro na tabela 'profissionals'
        $profissional = new Profissional([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'tipo' => $request->tipo,
        ]);

        $profissional->save();

        // redirecionar
        return redirect()->route('profissionals')->with('success', 'Profissional cadastrado com sucesso!');
    }

    public function show($id){
        $profissional = Profissional::find($id);
        return view ('profissionals.show', compact('profissional'));
    }

    public function destroy($id){
        // encontrar o profissional pelo ID

        $profissional = Profissional::findOrFail($id);
        // deletar o profissional
        $profissional->delete();

        // redirecionar com uma mensagem de sucesso
        return redirect()->route('profissionals')->with('success', 'Profissional deletado com sucesso!');
    }
}
