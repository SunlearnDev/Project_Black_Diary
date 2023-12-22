<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Diary;
use App\Models\Hashtag;
use App\Support\HTMLPurifier;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
            return view('Fontend.postDiary.diaryPublic', compact('posts'));
        } else {
            $posts = Diary::where('user_id', $userId)
                ->where('status', 1)
                ->with('user', 'hashtags')
                ->withCount('comments', 'reactions')
                ->orderByDesc('id')->get();
            return $posts;
        }

        // dd($posts->toRawSql(), $posts->get());
        // $test = Diary::where('status', 1)->with('hashtags')->whereHas('hashtags', function ($query) {
        //     $query->where('content', 'password');
        // });
        // $test = Diary::where('user_id', auth()->id())
        //     ->with('hashtags', 'comments.user:id,name')
        //     ->withCount('comments')
        //     ->orderByDesc('id');
        // dd($test->toRawSql(), $test->get());
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
            Log::info('Đăng bài viết thành công', ['user_id' => Auth::id(), 'post_id' => $dataPost->id]);
            return redirect('/user/create')->with('msgSuccess', 'Đăng bài viết thành công');
            // dd($test);
        } catch (\Exception) {
            // RollBack transaction nếu có lỗi
            DB::rollBack();
            Log::error('Đăng bài viết thất bại', ['user_id' => Auth::id()]);
            return redirect('/user/create')->with('msgFail', 'Đăng bài viết thất bại');
            // dd('Fail');
        }
    }
}
