<?php

namespace App\Http\Controllers;

use App\Enums\EmailStatusEnum;
use App\Models\Email;
use App\Models\User;
use App\Notifications\Email\ConfirmEmailNotification;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index(Request $request) {

        /** @var User */
        $user = $request->user();

        abort_if($user->isEmailConfirmed(), 404);

        $email = Email::query()
            ->where('user_id', $user->id)
            ->where('status', EmailStatusEnum::pending)
            ->firstOrFail();

        return view('email.confirmation', compact('email'));
    }

    public function confirm(Request $request, Email $email) {

        abort_if($email->user->isEmailConfirmed(), 404);
        abort_unless($email->status->is(EmailStatusEnum::pending), 404);

        // проверка кода
        $validator = validator($request->only('code'), [
            'code' => 'required|string'
        ]);

        if($validator->fails()) {
            return to_route('email.confirmation')
                ->withErrors(['code' => validator()->errors()->first()])
                ->withInput();
        }

        if($email->code !== $request->input('code')) {
            return to_route('email.confirmation')
                ->withErrors(['code' => 'Неверный код'])
                ->withInput();
        }

        $email->user->confirmEmail(); // подтверждаем email
        $email->updateStatus(EmailStatusEnum::completed); // меняем статус заявки

        return redirect()->intended('/user');
    }

    public function send(Request $request, Email $email)
    {
        // проверяем отправлено ли было письмо
        if (session('email-confirmation-sent')) {
            return back();
        }

        abort_if($email->user->isEmailConfirmed(), 404); // если email подтвержден – 404
        abort_unless($email->status->is(EmailStatusEnum::pending), 404); // если не pending – 404

        $notification = new ConfirmEmailNotification($email);
        $email->user->notify($notification);

        session(['email-confirmation-sent' => now()]); // сохраняем в сессию

        return back();
    }
}
