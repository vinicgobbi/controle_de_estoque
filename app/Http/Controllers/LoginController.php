<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // ARMAZENA LOGIN DE USUARIO E ID DA CLINICA
        $usuario = session('usuario');
        if ($usuario) {
            return redirect()->route('produtos');
        } else {
            return redirect()->route('loginGET');
        }
        
    }

    public function logout(Request $request)
    {
        // LIMPA OS DADOS DA SESSÃO
        session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // REDIRECIONA PARA TELA DE LOGIN NOVAMENTE
        return redirect()->route('loginGET');
    }
}
