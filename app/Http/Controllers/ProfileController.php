<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Http\Controllers\HandleImg\ImdUpload;
class ProfileController extends Controller
{
    public function index(){
        $data = Auth::user();
        return view('profile.profile', ['data' => $data,]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $data = User::find(Auth::id());

        $dataPathImage = $this->upLoadImg($request, 'avatar',  'profile');
            if ($dataPathImage != null){
                $imgPath = public_path().'/'.$data->avatar;
                if(file_exists($imgPath)){
                    unlink($imgPath);
                }
                $data->avatar = $dataPathImage;
            }

        $data->name = $request->input('name');
        $data->about = $request->input('about');
        $data->gender = $request->input('gender');
        $data->address = $request->input('address');
        $data->birthdate= $request->input('birthdate');
        if($data->save()){
            dd('ok');
            return redirect('/profile/setting/{id}')->with('msgSuccess', 'Cập Nhật thông tin thành công');
        }else{
            return redirect('/profile/setting/{id}')->with('msgError', 'Cập Nhật thông tin thất bại');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login')->with('msgSuccess', 'Đã đăng xuất thành công');
    }
   
}
