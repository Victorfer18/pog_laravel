<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']

        ],[
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O campo email não é válido!',
            'password.required' => 'O campo senha é obrigatório!'
        ]
    );

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->with('erro', 'Email ou senha inválida!');
        }

        $request->session()->regenerate();
        redirect()->intended('dashboard');
    }
}
