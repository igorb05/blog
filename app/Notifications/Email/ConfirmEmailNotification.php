<?php

namespace App\Notifications\Email;

use App\Models\Email;
use App\Models\Password;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(private Email $email)
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
        $url = app_url("/email/{$this->email->uuid}/confirm?code={$this->email->code}");

        return (new MailMessage)
            ->subject('Подтверждение почты')
            ->greeting('Здравствуйте!')
            ->line("Введите код подтверждения: {$this->email->code}")
            ->line('Или нажмите на кнопку ниже:')
            ->action('Подтвердить', $url);
    }
}
