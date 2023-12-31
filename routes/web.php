<?php

use App\Http\Controllers\Fontend\PostProfile;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Fontend\DiaryController;
use App\Http\Controllers\Fontend\AddressController;
use App\Http\Controllers\Fontend\SearchController;
use App\Http\Controllers\Fontend\SocialController;
use App\Http\Controllers\Fontend\FollowController;
use App\Http\Controllers\HandleImg\ImdUpload;
use App\Http\Controllers\Fontend\MessageController;
use App\Http\Controllers\Fontend\CommentController;

Route::get('/test', function () {
    return view('livewire.multi-hashtag');
});
Route::post('/upload', [ImdUpload::class, 'upload'])->name('cheditor.upload');

Route::get('/', [DiaryController::class, 'viewPosts']);

Route::get('/diary/{id}-{title}', [DiaryController::class, 'viewsdiaryAll'])->name('show.diaryAll');

// Route list Quận huyện
Route::post('/get_district', [AddressController::class, 'getDistrictCheckout']);

// Router User 
// Router link search
Route::get('/listsearch', [SearchController::class, 'getDataSearch']);

// Router show User search
Route::get('/profile/{id}', [PostProfile::class, 'index'])->name('profile.search');
// Route::get('/diary/{id}',[DiaryController::class,'showDiaryId'])->name('diary.showDiaryId');

// User Đăng nhập
Route::get('/login', [PostProfile::class, 'login'])->name('login');
Route::post('/login', [PostProfile::class, 'postLogin']);

// Đăng nhập bằng gg
Route::get('/google', [SocialController::class, 'redirect']);
Route::get('/callback/google', [SocialController::class, 'callback']);

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

//  Trang chính sau khi xác thực email
Route::get('/diary', [DiaryController::class, 'viewPosts'])->middleware(['auth', 'verified'])->name('index');

Route::prefix('/user')->middleware('handleLoginCustomer')->group(function () {
    // Các tuyến đường liên quan đến quản lý profile
    Route::get('/profile/{id}', [PostProfile::class, 'index'])->name('profile');
    Route::get('/setting', [PostProfile::class, 'edit'])->name('profile.edit');
    Route::patch('/setting/update', [PostProfile::class, 'updateProfile'])->name('profile.update');
    Route::patch('/setting/update_password', [PostProfile::class, 'updatePassword'])->name('profile.password');
    Route::delete('/setting/del', [PostProfile::class, 'destroy'])->name('profile.destroy');
    Route::get('/create', [DiaryController::class, 'viewCreate'])->name('create');

    // Following routes
    Route::post('/{id}/follow', [FollowController::class, 'follow'])->name('user.follow');
    Route::post('/{id}/unfollow', [FollowController::class, 'unfollow'])->name('user.unfollow');

    // Like routes
    Route::post('/{id}/likes', [DiaryController::class, 'likes'])->name('user.likes');
    Route::post('/{id}/unlikes', [DiaryController::class, 'unlikes'])->name('user.unlikes');

    //Post diary
    Route::get('/create', [DiaryController::class, 'viewCreate'])->name('create');
    Route::post('/create', [DiaryController::class, 'store'])->name('diary.create');

    Route::get('/show/{id}', [DiaryController::class, 'show'])->name('show.diary');
    Route::get('/edit/diary/{id}', [DiaryController::class, 'showEdit'])->name('showEdit.diary');
    Route::patch('/edit/diary/{id}', [DiaryController::class, 'edit'])->name('edit.diary');
    Route::delete('/delete/diary/{id}', [DiaryController::class, 'delete'])->name('delete.diary');

    Route::get('/notifications', [PostProfile::class, 'notifications']);
});

Route::middleware('handleLoginCustomer')->group(function () {
    // ─── Comment ───────────────────────────────────────────────────────
    
    Route::post('diary/{id}/comment', [CommentController::class, 'sendComment']);
    Route::delete('comment/{id}/delete', [CommentController::class, 'deleteComment']);
    Route::patch('comment/{id}/update', [CommentController::class, 'updateComment']);
    
    // ─── Chat ────────────────────────────────────────────────────────────────────
    
    Route::get('talk', [MessageController::class, 'user']);
    Route::get('talk/{fromUser}', [MessageController::class, 'getMessages']);
    Route::post('talk', [MessageController::class, 'sendMessage']);
    Route::patch('read', [MessageController::class, 'read']);
});

// ─── Get Reply ───────────────────────────────────────────────────────────────

Route::get('diary/comment/{id}', [CommentController::class, 'getReplies']);

// Đăng xuất
Route::post('/logout', [PostProfile::class, 'logout'])->name('logout');
require __DIR__ . '/auth.php';
