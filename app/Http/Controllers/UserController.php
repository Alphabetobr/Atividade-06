<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\filmes;

class UserController extends Controller
{


    public function login()
    {
        return view("login");
    }

    public function auth(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'O campo E-mail é obrigatório!',
            'password.required' => 'O campo Senha é obrigatório!',
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return view("painel");
        } else {
            return redirect()->back()->with('danger','Email ou senha inválidos');
        }
    }

    public function teste()
    {
        return view('painel');
    }

    public function register()
    {
        return view('cadastro');
    }

    public function cadastrar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $pass = $request['password'];
        $request['password'] = Hash::make($pass);
        User::create($request->all());
        return redirect()->route('login.page');
    }

}

