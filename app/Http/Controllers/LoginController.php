<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index ()
    {        
        $mensagemSucesso = session('mensagem.sucesso');

        return view('login.index')->with('mensagemSucesso', $mensagemSucesso);
    }

    public function store (Request $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors('Usuário ou senha inválidos!');
        }

        return to_route('series.index');
    }

    public function destroy()
    {
        Auth::logout();
        return to_route('login');
    }
}
