<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Post\RequestsPost;
use App\Http\Requests\User\Post\RequestsUpdatePost;
use App\Http\Controllers\HandleImg\ImdUpload;
use App\Models\DiaryModel;
use App\Models\Hastag;
use App\Models\DiaryHashtag;

class PostDiary extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function viewCreate(){
        return view('Fontend.postdiary.create_post');
    }
    public function store(RequestsPost $request){
        try{
            // Transaction đẻ đảm bảo tính nhất quán
            DB::beginTransaction();
            // Tạo 1 bài viết mới
            $dataPost = new DiaryModel();
            $dataPost->title = $request->title;
            $dataPost->content = $request->content;
            $dataPost->order = $request->order;
            $dataPost->id = Auth::id();
            
            // XỬ lý ảnh
            $imgUpload = new ImdUpload();
            $dataPostPathImage = $imgUpload->upLoadImg($request, 'image',  'postDiary');
                if ($dataPostPathImage != null){
                    $imgPath = public_path().'/'.$dataPost->image;
                    if(file_exists($imgPath)){
                       
                        unlink($imgPath);
                    }
                    $dataPost->image = $dataPostPathImage;
                }
            // Lưu bài viết
            $dataPost->save();

            // Xử lý HashTag
            $hashTag = explode('#', $request->hastag);
            foreach ($hashTag as $tag){
                $hashTag_id = Hastag::where('name', $tag)->first()->hastag_id; 
                if(!$hashTag_id){
                    $hashTag_id = Hastag::create(['name' => $tag])->hastag_id;
                }
                DiaryHashtag::create(["diary_id" => $dataPost->diary_id , "hastag_id" => $hashTag_id]);
            }
            // Commit Tranction nếu mọi thứ thành công
            DB::commit();
            dd('ok');
            return redirect('/user/create')->with('msgSuccess', 'Đăng bài viết thành công');

        }catch(\Exception $e){
            // RollBack transaction nếu có lỗi
            DB::rollBack();
            return redirect('/user/create')->with('msgSuccess', 'Đăng bài viết thất bại');
        }
        
    }
    
}
