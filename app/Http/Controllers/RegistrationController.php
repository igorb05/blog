<?php

namespace App\Http\Controllers;

use App\Events\UserCreatedEvent;
use App\Http\Requests\Registration\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index() {

        return view('registration.index');
    }

    public function store(StoreRequest $request) {

        $data = $request->only([
            'name',
            'email',
            'password'
        ]);

        $user= User::query()->create($data);

        event(new UserCreatedEvent($user));

        Auth::login($user);

        return redirect()->intended('user');
    }
}
