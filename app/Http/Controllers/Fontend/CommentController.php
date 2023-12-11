<?php

namespace App\Http\Controllers\Fontend;

use App\Models\Diary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function get($id)
    {
        $post = Diary::where('id', $id)
            ->where('status', 1)
            ->with('comments.user')
            ->withCount('comments')
            ->orderByDesc('id')->firstOrFail();
        return view('test', compact('post'));
        // dd($posts);
    }

    public function post(Request $request, $id)
    {
        if (Auth::check()) {
            // dd($request);
            $comment = Comment::create([
                'content' => $request->message,
                'user_id' => Auth::id(),
                'diary_id' => $id,
            ])->load('user');
            return response()->json($comment);
        } else
            return response()->json('error');
    }
}
