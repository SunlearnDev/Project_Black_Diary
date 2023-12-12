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
            ->with([
                'user',
                'comments' => function ($query) {
                    $query->doesntHave('parentComment')
                        ->with('user')
                        ->withCount('replies');
                },
            ])
            ->withCount('reactions', 'comments')
            ->orderByDesc('id')->firstOrFail();
        return view('test', compact('post'));
        // dd($post->toArray());
    }

    public function post(Request $request, $id)
    {
        if (Auth::check()) {
            // dd($request);
            $comment = Comment::create([
                'content' => $request->message,
                'user_id' => Auth::id(),
                'diary_id' => $id,
                'parent_id' => $request->parentId,
            ])->load('user');
            return response()->json($comment);
        } else
            return response()->json('error');
    }
}
