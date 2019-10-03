<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUsersRequest;
use App\Http\Requests\LoginUsersRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('pages.register');
    }

    public function register(AuthUsersRequest $request)
    {
       $user = User::add($request->all());
       $user->generatePassword($request->get('password'));

       return redirect('/login');
    }

    public function loginForm()
    {
        return view('pages.login');
    }

    public function login(LoginUsersRequest $request)
    {
        if (Auth::attempt([
           'email' => $request->get('email'),
           'password' => $request->get('password')
        ]))
        {
            return redirect('/');
        }
        return redirect()->back()->with('status', 'Неверный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
