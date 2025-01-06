<?php

namespace App\Providers;

use App\Events\PostViewedEvent;
use App\Events\UserCreatedEvent;
use App\Listeners\IncrementPostViewsListeners;
use App\Listeners\SendConfirmEmailNotificationListeners;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Password::defaults(function () { // дефолтные правила для паролей
           return Password::min(8)
               ->letters()
               ->mixedCase()
               ->numbers();
        });
    }

    protected $listen = [ // слушатели событий

        PostViewedEvent::class => [
            IncrementPostViewsListeners::class,
        ],

        UserCreatedEvent::class => [
            SendConfirmEmailNotificationListeners::class,
        ],
    ];
}
