<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainThumbnail;
use App\Education;
use App\Notice;
use App\UShop;
use App\News;

class MainController extends Controller {
    public function main() {
        $mainThumbnailList = MainThumbnail::where('is_show',0)->orderBy('order', 'asc')->get();

        
        $educationList = Education::where('is_show',0)->orderByDesc('created_at')->limit('8')->get();
        $noticeList = Notice::where('is_show',0)->orderByDesc('created_at')->limit('5')->get();
        $shopList = UShop::where('is_show',0)->orderByDesc('created_at')->limit('6')->get();
        $newsList = News::where('is_show',0)->orderByDesc('created_at')->limit('6')->get();
        // dd($newsList->all());
           

        return view('main', compact('mainThumbnailList', 'educationList', 'noticeList', 'shopList', 'newsList'));
    }
}
