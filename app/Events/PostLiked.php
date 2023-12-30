<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Diary;
use App\Models\User;
class PostLiked
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;
    public $liker;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Diary $post,User $liker)
    {
        $this->post = $post;
        $this->liker = $liker;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
