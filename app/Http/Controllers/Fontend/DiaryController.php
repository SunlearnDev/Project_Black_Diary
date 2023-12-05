<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Diary;
use App\Models\Hashtag;
use Illuminate\Support\Facades\Log;

class DiaryController extends Controller
{

    public function viewPosts( $userId = null)
    {
        if (Auth::check() && $userId == auth()->id()) {
            $posts = Diary::where('user_id', $userId)
                ->with('hashtags', 'comments.user:id,name')
                ->withCount('comments')
                ->orderByDesc('id')->get();
            return $posts;
        } elseif ($userId == null) {
            $posts = Diary::where('status', 1)
                ->with('hashtags', 'comments.user:id,name')
                ->withCount('comments')
                ->orderByDesc('id')->get();
                // dd($posts->toRawSql(), $posts->get());
            return view('Fontend.postDiary.diaryPublic', compact('posts'));
        } else {
            $posts = Diary::where('user_id', $userId)
                ->where('status', 1)
                ->with('hashtags', 'comments.user:id,name')
                ->withCount('comments')
                ->orderByDesc('id')->get();
            return $posts;
        }

    }

    public function viewCreate()
    {
        return view('Fontend.postdiary.diaryCreate');
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
                $dataPost->image = $imagePath;
            }
            // Lưu bài viết
            $dataPost->save();
            // Xử lý HashTag
            $hashTag = explode('#', $request->hashtag);
            array_shift($hashTag);
            foreach ($hashTag as $tag) {
                $tag = trim(strtolower($tag));
                $hashtag_id = Hashtag::where('content', $tag)->value('id');
                if (!$hashtag_id) {
                    // Hashtag chưa tồn tại, thêm mới
                    $newHashTag = Hashtag::create(['content' => $tag]);
                    $hashtag_id = $newHashTag->id;
                }
                // Liên kết Hashtag với Post trong bảng trung gian
                $dataPost->hashtags()->attach($hashtag_id);
            }
            // Commit Tranction nếu mọi thứ thành công
            DB::commit();
            Log::info('Đăng bài viết thành công', ['user_id' => Auth::id(), 'post_id' => $dataPost->id]);
            return view('Fontend.profile.partials.showProfile')->with('msgSuccess', 'Đăng bài viết thành công');
            // dd('Success');
        } catch (\Exception) {
            // RollBack transaction nếu có lỗi
            DB::rollBack();
            Log::error('Đăng bài viết thất bại', ['user_id' => Auth::id()]);
            return redirect('/user/create')->with('msgFail', 'Đăng bài viết thất bại');
            // dd('Fail');
        }
    }
}