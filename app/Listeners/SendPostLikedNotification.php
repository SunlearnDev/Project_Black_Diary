<?php

namespace App\Listeners;

use App\Events\PostLiked;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\LikeNotification;
class SendPostLikedNotification
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  PostLiked  $event
     * @return void
     */
    public function handle(PostLiked $event)
    {
        $liker = $event->liker;
        $post = $event->post;

        $post->user->notify(new LikeNotification($liker, $post));
    }
}
