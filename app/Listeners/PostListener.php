<?php

namespace App\Listeners;

use App\Events\PostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostEvent  $event
     * @return void
     */
    public function handle(PostEvent $event)
    {
        $post = $event->post;
        $post->timestamps = false;
        $post->views++;
        $post->save();
    }
}
