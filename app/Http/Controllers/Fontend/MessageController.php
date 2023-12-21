<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function user()
    {
        return response()->json(auth()->id());
    }

    public function getContacts()
    {
        $contacts = User::findOrFail(auth()->id())->contacts();
        return response()->json($contacts);
    }

    public function getMessages($fromUser)
    {
        $receiver = User::select('id', 'name', 'avatar', 'other_name', 'avatar')->findOrFail($fromUser);
        $receiver->messagesWith(auth()->id())
            ->whereNull('read_at')
            ->where('receiver_id', auth()->id())
            ->update(['read_at' => now()]);
        $messages = $receiver->messagesWith(auth()->id())->get();
        return response()->json(['receiver' => $receiver, 'messages' => $messages]);
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
