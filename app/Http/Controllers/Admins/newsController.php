<?php

namespace App\Http\Controllers\Admins;

use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class newsController extends Controller 
{    
    public function list() {
        $newsList = News::where('is_show', 0)->get();
        return view('admins/news/list', compact('newsList'));
    }

    public function state($id) {
        $newsId = News::where('id', $id)->first();
        
        if($newsId->is_show == 0){
            News::where('id', $id)->update(['is_show' => 1]);
            $message = $id.'번 글이 삭제 되었습니다.';
            $state = 'warning'; 
        }else {
            News::where('id', $id)->update(['is_show' => 0]);
            $message = $id.'번 글이 공개 되었습니다.';
            $state = 'success'; 
        }

        return redirect("admin/news/list")->with($state, $message);
    }

    public function create() {
        
        
        return view('admins/news/create');
    }

    public function createForm(Request $request) {
        if(Auth::user() == null) {
            $user_id = 1;
        } else {
            $user_id = Auth::user()->id;
        }

        // 게시물번호 초기화
        $getNewsLastNumber = News::count() + 1;
        
        // 첨부파일 유효성 검사 
        if(empty($request->file('file'))) { 
            // 첨부파일 없음 
            $fileName     = NULL;  
            $uploadFile   = NULL;
        }else {
            // 첨부파일 있음.
            $file = $request->file('file');                     // 변수 설정 
            $filePath = 'storage/files/news/';             // 파일 경로 설정 
            $fileFakeName = $getNewsLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$file->extension();    // 파일명 
            
            $file->move(public_path($filePath), $fileFakeName); // 파일 서버로 이동 
            $fileName = $file->getClientOriginalName();         // 실제 파일 이름
            $uploadFile = $filePath.$fileFakeName;              // 파일 다운받을 때 필요한 파일 이름 
        }

        // dd($uploadFile);
        // 썸네일 추가
        $fileThumbnail = $request->file('thumbnail');
        $fileThumbnailPath = 'storage/images/news/';
        $fileThumbnailName = $getNewsLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$fileThumbnail->extension();
        
        $fileThumbnail->move(public_path($fileThumbnailPath), $fileThumbnailName);
            
        
        $thumbnail                      = $fileThumbnailPath.$fileThumbnailName;
        
        News::create([
            'thumbnail'                 => $thumbnail,
            'title'                     => $request->title,
            'body'                      => $request->body,
            'uploadfile'                => $uploadFile,
            'filename'                  => $fileName,
            'user_id'                   => $user_id, 
        ]);

        return redirect("admin/news/list")->with('success', '최근소식 게시글이 추가되었습니다.');
    }

    public function update(Request $request) {
        $news = News::where('id', $request->id)->first();
                
        return view('admins/news/update', compact('news'));
    }

    public function updateForm(Request $request) {
        $getNewsLastNumber = $request->id;
        // 첨부파일 없음 
        $fileName     = NULL;  
        $uploadFile   = NULL;

        if(empty($request->thumbnail)) {
            $thumbnail = $request->r_thumbnail;
        } else {
            $fileThumbnail = $request->file('thumbnail');
            $fileThumbnailPath = 'storage/images/news/';
            $fileThumbnailName = $getNewsLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$fileThumbnail->extension();
            $fileThumbnail->move(public_path($fileThumbnailPath), $fileThumbnailName);
                
            $thumbnail                      = $fileThumbnailPath.$fileThumbnailName;
        }
        
        if(empty($request->file)) {
            $uploadFile = $request->r_file;
            $fileName = $request->r_filename;
        } else {
            $file = $request->file('file');                     // 변수 설정 
            $filePath = 'storage/files/news/';             // 파일 경로 설정 
            $fileFakeName = $getNewsLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$file->extension();    // 파일명 

            $file->move(public_path($filePath), $fileFakeName); // 파일 서버로 이동 
            $fileName = $file->getClientOriginalName();         // 실제 파일 이름
            $uploadFile = $filePath.$fileFakeName;              // 파일 다운받을 때 필요한 파일 이름 
        }

        News::where('id', $request->id)->update([
            'thumbnail'         => $thumbnail,
            'title'             => $request->title,
            'body'              => $request->body,
            'uploadfile'        => $uploadFile,
            'filename'          => $fileName
        ]);

        return redirect("admin/news/list")->with('success', '상설매장 게시물이 수정되었습니다.');
    }

    public function delete() {
        $newsList = News::where('is_show', 1)->get();

        return view('admins/news/delete', compact('newsList'));
    }
}
