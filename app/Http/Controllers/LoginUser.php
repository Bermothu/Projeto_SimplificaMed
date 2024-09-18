<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LoginUser extends Controller
{
    // utilizamos o import Request para manipular os dados post do usuário
    public function login (Request $request) {
        $nome = $request->post('name');
        $email = $request->post('email');
        $password = $request->post('password');
        $password_confirmation = $request->post('password_confirmation');
        return ($nome . ' : ' . $email . ' : ' . $password);
        // return view('profile');
    }
}
