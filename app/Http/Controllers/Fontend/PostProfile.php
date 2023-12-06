<?php

namespace App\Http\Controllers\Fontend;


use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\HandleImg\ImdUpload;
use App\Models\Citys;
use Carbon\Carbon;

class PostProfile extends Controller
{

    public function __construct()
    {
        $active = "active";
        view()->share('activeShip', $active);
    }

    //  Lấy dữ liệu từ DB
    /**
     * int 
     */
    public function index($id = null)
    {
        $data = User::find($id);
        $dataCity = Citys::all();
        $posts = app('App\Http\Controllers\Fontend\DiaryController')->viewPosts($id);
        if (Auth::check() && Auth::user()->id == $id) {
            return view('Fontend.profile.profileAccount', [
                'data' => $data, 'dataCity' => $dataCity, 'posts' => $posts
            ]);
        } else {
            return view('Fontend.profile.profileAccount', [
                'data' => $data, 'dataCity' => $dataCity, 'posts' => $posts
            ]);
        }
    }
    public function login()
    {
        return view('auth.login');
    }
    // view edit profile
    public function edit()
    {
        $data = Auth::user();
        $dataCity = Citys::all();
        return view('Fontend.profile.edit', [
            'data' => $data, 'dataCity' => $dataCity,
        ]);
    }

    // xử lý login
    public function postLogin(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password], $request->has('remember'))) {
            if (Auth::user()->email_verified_at == null) {
                return redirect('/email/verify');
            }
            return redirect()->back()->with('msgSuccess', 'Đăng nhập thành công');
        } else {
            return view('auth.login')->with('msgError', 'Email hoặc mật khẩu không đúng');
        }
    }


    // View đăng ký
    public function showRegister()
    {
        return view('auth.register');
    }

    //  Xử lý đăng ký 
    public function postRegister(Request $request): RedirectResponse
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
                'role' => '3',
            ]
        );
        $imgUpload = new ImdUpload();
        $user->avatar = $imgUpload->autoAvatar($user);
        $user->save();
        event(new Registered($user));
        Auth::login($user);
        return redirect('/');
    }

    //chức năng đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('msgSuccess', 'Đã đăng xuất thành công');
    }


    // Xử lý cập nhật User profile
    public function updateProfile(Request $request)
    {
        $request->validate(
            [
                'name' => 'string|max:255',
                'other_name' => 'nullable|string|max:255',
                'about' => 'nullable|string|max:500',
                'phone' => 'nullable|string|min:10|max:10',
                'address' => 'nullable|string|max:255',
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'birthdate' => 'nullable|Before:' . Carbon::now()->subYears(16)->format('Ymd'),
            ],
        );
        $data = User::find(Auth::id());

        $imgUpload = new ImdUpload();
        $dataPathImage = $imgUpload->upLoadImg($request, 'avatar',  'profile');
        if ($dataPathImage != null) {
            $imgPath = public_path() . '/' . $data->avatar;
            if (file_exists($imgPath)) {

                unlink($imgPath);
            }
            $data->avatar = $dataPathImage;
        }
        // Sau khi validation
        $phone = $request->phone;
        if (!is_numeric($phone)) {
        }
        $data->phone = $request->phone;


        $data->name = $request->name;
        $data->about = $request->about;
        $data->other_name = $request->other_name;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->city_id = $request->city_id;
        $data->district_id = $request->district_id;
        $data->birthdate = $request->birthdate;
        if ($data->save()) {
            return redirect('/user/profile/{id}')->with('msgSuccess', 'Cập Nhật thông tin thành công');
        } else {
            return view('Fontend.partials.edit')->with('msgError', 'Cập Nhật thông tin thất bại');
        }
    }

    // Handle password change
    public function updatePassword(Request $request)
    {
        $data = User::find(Auth::id());
        $request->validate(
            [
                'password_old' => [
                    'required',
                    function ($attribute, $password_old, $fail) {
                        if (!Hash::check($password_old, Auth::user()->password)) {
                            $fail('Mật khẩu chưa đúng');
                        }
                    },
                ],
                'password' => 'required|min:5|max:20',
                'password_again' => 'required|same:password',
            ],
            [
                'password.required' => 'Mật khẩu không được để trống',
                'password_again.required' => 'Mật khẩu xác nhận không được để trống',
                'password.min' => 'Mật khẩu quá ngắn phải lớn hơn 5 kí tự',
                'password.max' => 'Mật khẩu quá dài phải nhỏ hơn 20 kí tự',
                'password_again.same' => 'Mật khẩu xác nhận không khớp',
            ]
        );
        $data->password = Hash::make($request->password);
        if ($data->save()) {
            return redirect()->back()->with('msgSuccess', 'Cập Nhật thông tin thành công');
        } else {
            return view('Fontend.partials.edit')->with('msgError', 'Cập Nhật thông tin thất bại');
        }
    }
    public function showProfilesId($id, $name)
    {
        $user = User::find($id);
        $dataCity = Citys::all();
        return  view(
            'Fontend.profile.profileUser',
            ['data' => $user, 'dataCity' => $dataCity,]
        );
    }
}
