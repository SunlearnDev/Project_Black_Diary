<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\FollowNotification;
class FollowController extends Controller
{

     /**
      * Follow the user.
      * 
      * @param  $id
      */
     public function follow(int $id)
     {
          $follower = User::find($id);    
          $user = auth()->user();  
          $follower->followers()->attach($user->id);
          $follower->notify(new FollowNotification($user));
          return redirect()->route('your.route.name')->with("msgSuccess", "Followed successfully");
          
     }


    public function unFollow(int $id){
        $user = User::find($id);
         $user->followers()->detach(auth()->user()->id);
         return redirect()->back()->with("msgSuccess","Bỏ theo dõi thành công");
    }

}
