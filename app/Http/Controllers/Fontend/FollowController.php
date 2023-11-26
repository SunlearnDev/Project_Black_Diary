<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{

    /**
     * Follow the user.
     * 
     * @param  $id
     */
    public function follow(int $id){
       $user = User::find($id);
       if(!$user){
            return redirect()->back()->with("msgError","Người dùng không tồn tại");
       }else{
        $user->followers()->attach(auth()->user()->id);
        return redirect()->back()->with("msgSuccess","Theo dõi thành công");
       }
    }


    public function unFollow(int $id){
        $user = User::find($id);
        if(!$user){
             return redirect()->back()->with("msgError","Người dùng không tồn tại");
        }
         $user->followers()->detach(auth()->user()->id);
         return redirect()->back()->with("msgSuccess","Bỏ theo dõi thành công");
    }

}
