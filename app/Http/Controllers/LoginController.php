<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function index(Request $request){

        $erro = '';
        
        switch ($request->get('erro')) {
            case 1:
                $erro = 'Usuário e/ou não existe.';
                break;
            case 2:
                $erro = 'Necessário realizar o login para ter acesso a página.';
                break;
        }

        return view('site.login', ['erro' => $erro]);

    }

    public function autenticar(Request $request){

        $regras = [
            'login' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'login.email'    => 'O campo e-mail é obrigatório.',
            'senha.required' => 'O campo senha é obrigatório.',
        ];

        $request->validate($regras, $feedback);

        $email    = $request->get('login');
        $password = $request->get('senha');

        $usuario = User::where('email', $email)->where('password', $password)->get()->first();

        if(!$usuario){
            return redirect()->route('site.login', ['erro' => 1]);
        }else{
            session_start();
            $_SESSION['nome']  = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
        }

    }

    public function sair(){

        session_destroy();

        return redirect()->route('site.index');

        //echo 'Sair';
    }
}
