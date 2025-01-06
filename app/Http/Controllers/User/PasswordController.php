<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Password\UpdateRequest;
use App\Models\User;

class PasswordController extends Controller
{
    public function update(UpdateRequest $request)
    {
        /** @var User */

        $user = $request->user();

        $user->updatePassword($request->input('password'));

        return to_route('user.settings');
    }
}
