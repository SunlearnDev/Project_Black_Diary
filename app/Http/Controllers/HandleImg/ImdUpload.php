<?php

namespace App\Http\Controllers\HandleImg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class ImdUpload extends Controller
{
    public function autoAvatar($user)
  {

    $avatarPath = public_path('/img/avatar_auto');

    if (File::exists($avatarPath)) {

      $files = File::files($avatarPath);

      if (count($files) > 0) {

        $randomFile = $files[array_rand($files)];

        $avatarName = pathinfo($randomFile, PATHINFO_BASENAME);

        // Đường dẫn đến thư mục lưu trữ trong storage/app/public

        $storagePath = 'public/profile';

        // Di chuyển tệp đến thư mục lưu trữ

        Storage::putFileAs($storagePath, $randomFile, $avatarName);

        $user->update([

          'avatar' => 'storage/profile/' . $avatarName

        ]);

        return Storage::url($storagePath . '/' . $avatarName);
      }
    }

    return null;
  }
  // Upload 1 file ảnh
  public function upLoadImg($request, $fileName, $fodername){
    //Kiểm tra đã tồn tại hay chưa
    if($request->hasFile($fileName)){
     try{
      $uploadedImage = $request->file($fileName);
      $imageName = Str::random(10). '_' . $uploadedImage->getClientOriginalName();
      $path = $request->file($fileName)->storeAs('public/profile', $imageName);
      // kiểm tra thư mục tồn tại
      if(!Storage::exists('public/'.$fodername)){
        Storage::makeDirectory('public/'.$fodername);
      }
      $dataPath = Storage::url($path);
      return $dataPath;
     }catch(\Exception $e){
      return null;
     }
    }
    return null;
  }
 // Upload nhiều file ảnh
  public function upLoadImgs($request, $fileName, $fodername){
    $dataPath = [];
    if($request->hasFile($fileName)){
      foreach($request->filesName as $item){
        $imageName = Str::random(10). '_' . $item->getClienOriginalName();
        $path = $item->storeAs('public/'.$fodername, $imageName);
        $dataPath[$imageName] = Storage::url($path);
      }
    }
    return $dataPath;
  }
}
