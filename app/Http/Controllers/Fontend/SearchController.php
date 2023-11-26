<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DiaryModel;
use App\Models\Hashtag;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function getDataSearch() {
        $users = User::orderBy('created_at', 'DESC');
    
        $diaries = DiaryModel::orderBy('created_at', 'DESC');
        
        $hashtags = Hashtag::orderBy('created_at', 'DESC');
        $searchName =request()->get('search');
        if (request()->has('search')) {
            $searchItem = '%' . $searchName . '%';
    
            $users->where(function ($query) use ($searchItem) {
                $query->where('name', 'like', $searchItem)
                    ->orWhere('other_name', 'like', $searchItem);
            });
    
            $diaries->where(function ($query) use ($searchItem) {
                $query->where('title', 'like', $searchItem)
                    ->orWhere('content', 'like', $searchItem);
            });
    
            $hashtags->where('content', 'like', $searchItem);
        }
    
        $users = $users->get();
        $diaries = $diaries->get();
        $hashtags = $hashtags->get();
    
       
        return view('layouts.viewSearch', [
            'users' => $users,
            'diaries' => $diaries,
            'hashtags' => $hashtags,
            'searchName'=>$searchName,
        ]);
    }
}
