<?php

namespace App\Listeners;

use App\Enums\EmailStatusEnum;
use App\Events\UserCreatedEvent;
use App\Models\Email;
use App\Notifications\Email\ConfirmEmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendConfirmEmailNotificationListeners implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(UserCreatedEvent $event): void
    {
        if ($event->user->isEmailConfirmed()) {
            return;
        }

        // Создание заявки
        $email = Email::query()->create([
            'value' => $event->user->email,
            'user_id' => $event->user->id,
            'status' => EmailStatusEnum::pending,
        ]);

        // Создание уведомления
        $notification = new ConfirmEmailNotification($email);
        $event->user->notify($notification);
    }
}
