<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Diary;
use App\Models\Hashtag;
use App\Models\Likes;
use App\Models\DiaryHashtag;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Notifications\LikeNotification;

class DiaryController extends Controller
{

    public function viewPosts($userId = null)
    {
        if (Auth::check() && $userId == auth()->id()) {
            $posts = Diary::where('user_id', $userId)
                ->with('user', 'hashtags')
                ->withCount('comments', 'reactions')
                ->orderByDesc('id')->get();
            return $posts;
        } elseif ($userId == null) {
            $posts = Diary::where('status', 1)
                ->with('user', 'hashtags')
                ->withCount('comments', 'reactions')
                ->orderByDesc('id')->get();
            return view('Fontend.postdiary.diaryPublic', compact('posts'));
        } else {
            $posts = Diary::where('user_id', $userId)
                ->where('status', 1)
                ->with('user', 'hashtags')
                ->withCount('comments', 'reactions')
                ->orderByDesc('id')->get();
            return $posts;
        }
    }

    public function hashtagFilter(string $hashTag)
    {
    }

    public function viewCreate()
    {
        return view('Fontend.postdiary.diaryCreate');
    }

    public function viewsdiaryAll($id)
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
        return view('Fontend.postdiary.diaryPost', compact('post'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Tạo 1 bài viết mới
            $dataPost = new Diary;
            $dataPost->title = $request->title;
            $dataPost->content = $request->content;
            $dataPost->status = $request->status;
            $dataPost->user_id = Auth::id();

            // XỬ lý ảnh
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('postDiary', 'public');
                $dataPost->image = Storage::url($imagePath);
            }

            // Lưu bài viết
            $dataPost->save();

            // Xử lý HashTag
            $hashTag = explode('#', $request->hashtag);
            array_shift($hashTag);
            foreach ($hashTag as $tag) {
                $tag = trim(strtolower($tag));
                $hashtagId = Hashtag::firstOrCreate(['content' => $tag]);
                $dataPost->hashtags()->attach($hashtagId->id);
            }
            // Commit Tranction nếu mọi thứ thành công
            DB::commit();
            return redirect('/diary/' . $dataPost->id . '-' . Str::slug($dataPost->title))->with('msgSuccess', 'Đăng bài viết thành công');
        } catch (\Exception) {
            // RollBack transaction nếu có lỗi
            DB::rollBack();
            Log::error('Đăng bài viết thất bại', ['user_id' => Auth::id()]);
            return redirect('/user/create')->with('msgFail', 'Đăng bài viết thất bại');
        }
    }

    public function showEdit($id)
    {
        $post = Diary::find($id);
        $hashtagsData = DiaryHashtag::where('diary_id', $id)->with('hashtag')->get();
        $hashtags = $hashtagsData->pluck('hashtag.content')->toArray();
        return view('Fontend.postdiary.eidtPost', compact('post', 'hashtags'));
    }

    public function edit($id, Request $request)
    {
        DB::beginTransaction();
        try {
            // Tạo 1 bài viết mới
            $dataPost = Diary::find($id);
            $dataPost->title = $request->title;
            $dataPost->content = $request->content;
            $dataPost->status = $request->status;
            $dataPost->user_id = Auth::id();
            // XỬ lý ảnh
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('postDiary', 'public');
                $dataPost->image = Storage::url($imagePath);
            }

            // Lưu bài viết
            $dataPost->save();
            // lấy hashtag cũ
            $oldHashtags = $dataPost->hashtags()->pluck('content')->toArray();
            // Xử lý HashTag mới          
            foreach ($oldHashtags as $oldTag) {
                $oldTag = trim(strtolower($oldTag));
                $hashtagId = Hashtag::where('content', $oldTag)->value('id');

                $dataPost->hashtags()->detach($hashtagId);
            }
            $hashTag = explode('#', $request->hashtag);
            array_shift($hashTag);
            foreach ($hashTag as $tag) {
                $tag = trim(strtolower($tag));
                $hashtagId = Hashtag::firstOrCreate(['content' => $tag]);
                $dataPost->hashtags()->attach($hashtagId->id);
            }
            // Commit Tranction nếu mọi thứ thành công
            DB::commit();
            return redirect('/diary/' . $dataPost->id . '-' . Str::slug($dataPost->title))->with('msgSuccess', 'Đăng bài viết thành công');
            // dd('Success');
        } catch (\Exception) {
            // RollBack transaction nếu có lỗi
            DB::rollBack();
            Log::error('Đăng bài viết thất bại', ['user_id' => Auth::id()]);
            return redirect('/user/create')->with('msgFail', 'Đăng bài viết thất bại');
            // dd('Fail');
        }
    }

    public function delete($id)
    {
        $diary = Diary::findOrFail($id);
        $diary->delete();
        return response()->json(['success' => false, 'post' => 'post_' . $id]);
    }

    public function likes(Request $request, Diary $id)
    {
        $reaction = new Likes([
            'user_id' => Auth::id(),
            'diary_id' => $id->id,
            'status' => $request->status
        ]);
        $reaction->save();
        event(new LikeNotification($id, auth()->user()));
    }

    public function unlikes($id)
    {
        $user = auth()->user();

        // Tìm và xóa like nếu tồn tại
        Likes::where(['user_id' => $user->id, 'diary_id' => $id])->delete();

        return redirect()->back();
    }
}