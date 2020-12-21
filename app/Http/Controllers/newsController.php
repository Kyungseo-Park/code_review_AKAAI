<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class newsController extends Controller
{
    public function list() {
        $newsList = News::where('is_show', 0)->orderBy('id', 'desc')->paginate(10);
        return view('news/list', compact('newsList'));
    }

    public function show($id) {
        
        $news = News::where('is_show', 0)->where('id', $id)->find($id);
        if($news == NULL) {
            return abort(404);
        }

        $nextPost       = News::where('is_show', 0)->where('id', '>' ,$id)->orderBy('id', 'asc')->first();
        $previousPost   = News::where('is_show', 0)->where('id', '<' ,$id)->orderBy('id', 'desc')->first();

        News::where('id', $id)->update([
            'hits' => $news->hits + 1,
        ]);
        return view('news/show', compact('news', 'nextPost', 'previousPost'));
    }
}
