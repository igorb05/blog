<?php

namespace App\Http\Controllers;

use App\Enums\PasswordStatusEnum;
use App\Http\Requests\Password\RestoreRequest;
use App\Http\Requests\Password\StoreRequest;
use App\Models\Password;
use App\Notifications\Password\ConfirmPasswordNotification; // Notifications универсальнее чем Mail, он позволяет отправлять одно уведомление по разным каналам – тг, почта, на сайте
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function store(StoreRequest $request)
    {
        $ip = $request->ip();
        $email = $request->input('email');

        $user = User::query()
            ->where(compact('email'))
            ->first();

        $password = Password::query()
            ->create(compact('ip', 'email') + ['user_id' => $user?->id]);

        $user?->notify(new ConfirmPasswordNotification($password)); // проверка есть ли юзер, если да отправляем письмо

        return to_route('password.confirmation'); // если юзера нет, то все равно показыаем ту же страницу
    }

    public function edit(Password $password) {

        abort_unless($password->user_id, 404); // если юзера нет – 404
        abort_unless($password->status->is(PasswordStatusEnum::pending), 404); // если заявка по восстановлению закрыта – 404

        return view('password.edit', compact('password'));
    }

    public function update(RestoreRequest $request, Password $password)
    {
        abort_unless($password->user_id, 404);

        /** @var User */
        $user = $password->user;
        $user->updatePassword($request->input('password'));
        $password->updateStatus(PasswordStatusEnum::completed);

        Auth::login($user);

        return to_route('user.settings');
    }
}
