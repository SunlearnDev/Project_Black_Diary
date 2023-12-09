<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\HandleImg\ImdUpload;


class SocialController extends Controller
{
    public function redirect(){
            // Socialite::driver('google'): Chọn driver cho dịch vụ xã hội, trong trường hợp này là Google.
            return  Socialite::driver('google')->redirect();
    }

    public function callback(){

            $googleUser = Socialite::driver('google')->user();
            $user = $this->createUser($googleUser);
            auth()->login($user);
            if ($user->email_verified_at == null){
                return redirect('/email/verify');
            }      
            return redirect(Session::get('url.intended'))->with('msgSuccess', 'Đăng nhập thành công');
    }
    function createUser($googleUser){
        $user = User::Where('email',$googleUser->email)->first();
        $length = 8;
        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()-_+";
        $nameGG = 'User' . Str::random(5);
            if(!$user){
                $passwordGG = Str::random($length, $characters);
                $user = User::create([
                    'email' => $googleUser->email,
                    'name' => $nameGG,
                    'password' => bcrypt($passwordGG),
                    'role' => 3
                ]);
                $imgUpload = new ImdUpload();
                $user->avatar = $imgUpload->autoAvatar($user);
            }
            return $user;
    }
}