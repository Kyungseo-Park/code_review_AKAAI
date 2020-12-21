<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class noticeController extends Controller
{
    public function list() {
        
        $noticeList = Notice::where('is_show', 0)->orderBy('id', 'desc')->paginate(10);
        return view('notice/list', compact('noticeList'));
    }

    public function show($id) {
        
        $notice = Notice::where('is_show', 0)->where('id', $id)->find($id);
        

        if($notice == NULL) {
            return abort(404);
        }
        
        $nextPost       = Notice::where('is_show', 0)->where('id', '>' ,$id)->orderBy('id', 'asc')->first();
        $previousPost   = Notice::where('is_show', 0)->where('id', '<' ,$id)->orderBy('id', 'desc')->first();


        Notice::where('id', $id)->update([
            'hits' => $notice->hits + 1,
        ]);

        return view('notice/show', compact('notice', 'nextPost', 'previousPost'));
    }
}
