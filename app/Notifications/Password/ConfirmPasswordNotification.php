<?php

namespace App\Notifications\Password;

use App\Models\Password;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(private Password $password)
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail']; // возвращает массив каналов
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage // возвраещает объект MailMessage
    {
        $url = app_url("/password/{$this->password->uuid}");

        return (new MailMessage)
            ->subject('Изменение пароля')
            ->greeting('Здравствуйте!')
            ->line('Чтобы изменить пароль нажмите на кнопку ниже:')
            ->action('Изменить', $url);
    }
}
