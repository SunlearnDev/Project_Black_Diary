<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function sendComment(Request $request, $id)
    {
        if (Auth::check()) {
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

    public function getReplies($id)
    {
        $replies = Comment::where(function ($query) use ($id) {
            $query->where('parent_id', $id);
        })
            ->with('user:id,name,avatar,other_name')
            ->withCount('replies')
            ->get();
        return response()->json(['replies' => $replies, 'auth' => Auth::id()]);
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->user_id == Auth::id()) {
            $comment->delete();
            return response()->json('success');
        } else return response()->json('fail');
    }

    public function updateComment(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->user_id == Auth::id()) {
            $comment->update(['content' => $request->message]);
            return response()->json('success');
        } else return response()->json('fail');
    }
}
