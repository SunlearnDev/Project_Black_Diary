<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function user()
    {
        return response()->json(auth()->id() ?? 0);
    }

    public function getContacts() {
        $contacts = User::find(auth()->id())->contacts()->reverse();
        // $contacts = User::withCount('unreadMessages')->get();
        dd($contacts->toArray());
    }

    public function getMessages($receiverId)
    {
        $receiver = User::find($receiverId);
        $messages = $receiver->messagesWith(auth()->id());
        $messages->update(['read_at' => now()]);
        return response()->json([$receiver, $messages]);
    }

    public function sendMessage()
    {
        $message = Message::create([
            'content' => request('message'),
            'sender_id' => auth()->id(),
            'receiver_id' => request('receiverId'),
            'read_at' => null,
        ]);
        return response()->json($message);
    }
}
