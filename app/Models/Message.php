<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Broadcasting\Channel;

class Message extends Model
{
    use HasFactory, BroadcastsEvents;

    protected $guarded = ['id'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function broadcastOn(string $event): array
    {
        return match ($event) {
            'created' => [new PrivateChannel('chat.'.$this->receiver_id)],
            default => null,
        };
    }
}
