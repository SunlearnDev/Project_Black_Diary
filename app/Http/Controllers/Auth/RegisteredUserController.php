<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\HandleImg\ImdUpload;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'user_name' => 'required|min:2|max:50',
                // Tên người dùng, từ 5 đến 50 ký tự. 
                'user_email' => 'required|unique:users,email|max:50',
                // Mật khẩu yêu cầu ít nhất 8 ký tự với ít nhất một chữ hoa, một số, và một ký tự đặc biệt. 
                'user_password' => 'required|min:8|max:50| regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                // Xác nhận mật khẩu, phải trùng với mật khẩu đã nhập. 
                'user_password_again' => 'required|same:user_password',
            ],
            [
                'user_name.required' => 'Tên không được để trống',
                'user_name.min' => 'Tên phải lớn hơn 2 kí tự',
                'user_name.max' => 'Tên phải bé hơn 50 kí tự',
                'user_email.required' => 'Email không được để trống',
                'user_email.unique' => 'Email này đã được sử dụng',
                'user_email.email' => 'Email chưa đúng định dạng',
                'user_email.max' => 'Email phải bé hơn 30 kí tự',
                'user_password.required' => 'Mật khẩu không được để trống',
                'user_password.min' => 'Mật khẩu phải dài hơn 8 kí tự',
                'user_password.max' => 'Mật khẩu không được dài quá 50 kí tự',
                'user_password_again.required' => 'Mật khẩu xác nhận không được để trống',
                'user_password_again.same' => 'Mật khẩu xác nhận không giống',
                'user_password.regex' => 'Mật khẩu phải chứa ít nhất một chữ hoa, một chữ thường, một số và một ký tự đặc biệt.',
            ]
        );
        $user = User::create(
            [
                'name' => $request->user_name,
                'email' => $request->user_email,
                'password' => Hash::make($request->user_password),
                'role' => '1',
            ]
        );
        $imgUpload = new ImdUpload();
        $user->avatar = $imgUpload->autoAvatar($user);
        $user->save();
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
