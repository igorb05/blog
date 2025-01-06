<?php

namespace App\Listeners;

use App\Events\PostViewedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncrementPostViewsListeners
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostViewedEvent $event): void
    {
        $post = $event->post;
        $post->increment('views');
    }
}
