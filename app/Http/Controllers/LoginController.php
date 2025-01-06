<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {

        return view('login.index');
    }

    public function store(StoreRequest $request) {

        $data = $request->only('email', 'password');

        $remember = (boolean) $request->input('remember');

        if (!Auth::attempt($data, $remember)) {
            return back()->withErrors([
                'email' => 'Неверный логин или пароль',
            ])->onlyInput('email');
        }

        request()->session()->regenerate(); // от атаки через id сессии

        return redirect()->intended('/user'); // метод откроет ту страницу которую пользователь предполагал открыть
    }
}
