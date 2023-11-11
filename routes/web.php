    <?php

    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\Fontend\PostProfile;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Foundation\Auth\EmailVerificationRequest;
    use Illuminate\Http\Request;
    // use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
    // use App\Http\Controllers\Auth\AuthenticatedSessionController;
    // use App\Http\Controllers\Auth\ConfirmablePasswordController;
    // use App\Http\Controllers\Auth\EmailVerificationNotificationController;
    // use App\Http\Controllers\Auth\EmailVerificationPromptController;
    use App\Http\Controllers\Auth\NewPasswordController;
    // use App\Http\Controllers\Auth\PasswordController;
    use App\Http\Controllers\Auth\PasswordResetLinkController;
    // use App\Http\Controllers\Auth\RegisteredUserController;
    // use App\Http\Controllers\Auth\VerifyEmailController;
    use App\Http\Controllers\Fontend\DiaryController;
    use App\Http\Controllers\Fontend\AddressController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::post('/get_district', [AddressController::class, 'getDistricCheckout']);
    
    // Router User 
    // User Đăng nhập
    Route::get('login', [PostProfile::class, 'index'])->name('login');
    Route::post('login', [PostProfile::class, 'postLogin']);
    
    // User Đăng Ký
    Route::get('register', [PostProfile::class, 'showRegister'])->name('register');
    Route::post('register', [PostProfile::class, 'postRegister']);
    
    //User Quên Pass
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    
    //User reset mk
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
    
    // Chức năng User
    // Xác thực email
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');
    
    // GỞi thông báo email
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
    
    //link liên kết trong mail
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/home');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    // Trang chính sau khi xác thực email
    Route::get('/index', function () {
        return view('welcome');
    })->middleware(['auth', 'verified'])->name('index');

    Route::prefix('/user')->middleware('auth')->group(function () {
        // Các tuyến đường liên quan đến quản lý profile
        Route::get('/profile/{id}', [PostProfile::class, 'index'])->name('profile');
        Route::get('/setting', [PostProfile::class, 'edit'])->name('profile.edit');
        Route::patch('/setting/update', [PostProfile::class, 'updateProfile'])->name('profile.update');
        Route::patch('/setting/update_password', [PostProfile::class, 'updatePassword'])->name('profile.password');
        Route::delete('/setting/del', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Đăng xuất
        Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');

        //Post diary
        Route::get('/create', [DiaryController::class, 'viewCreate'])->name('create');
        Route::post('/create', [DiaryController::class, 'store']);

        // View post
        Route::get('posts', [DiaryController::class, 'viewPosts'])->name('posts');
    });

    require __DIR__ . '/auth.php';