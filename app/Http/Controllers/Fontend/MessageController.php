<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('test');
    }

    public function user()
    {
        return response()->json(auth()->id() ?? 0);
    }

    public function post(Request $request)
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
