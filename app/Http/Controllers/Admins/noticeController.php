<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Notice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class noticeController extends Controller
{
    public function list() {
        $noticeList = Notice::where('is_show', 0)->get();
        
        return view('admins/notice/list', compact('noticeList'));
    }

    public function state($id) {

        $noticeId = Notice::where('id', $id)->first();
        
        if($noticeId->is_show == 0){
            Notice::where('id', $id)->update(['is_show' => 1]);
            $message = $id.'번 글이 삭제 되었습니다.';
            $state = 'warning'; 
        }else {
            Notice::where('id', $id)->update(['is_show' => 0]);
            $message = $id.'번 글이 공개 되었습니다.';
            $state = 'success'; 
        }

        return redirect("admin/notice/list")->with($state, $message);
    }

    public function create() {

        return view('admins/notice/create');
    }

    public function createForm(Request $request) {

        if(Auth::user() == null) {
            $user_id = 1;
        } else {
            $user_id = Auth::user()->id;
        }

        // 게시물번호 초기화
        $getNoticeLastNumber = Notice::count() + 1;
        
        // 첨부파일 유효성 검사 
        if(empty($request->file('file'))) { 
            // 첨부파일 없음 
            $fileName     = NULL;
            $uploadFile   = NULL;
        }else {
            // 첨부파일 있음.
            $file = $request->file('file');                     // 변수 설정 
            $filePath = 'storage/files/notice/';                // 파일 경로 설정 
            $fileFakeName = $getNoticeLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$file->extension();    // 파일명 
            
            $file->move(public_path($filePath), $fileFakeName); // 파일 서버로 이동 
            $fileName = $file->getClientOriginalName();         // 실제 파일 이름
            $uploadFile = $filePath.$fileFakeName;              // 파일 다운받을 때 필요한 파일 이름 
        }

        // 테이블 생성 
        Notice::create([
            'user_id'                   => $user_id, 
            'body'                      => $request->body,
            'title'                     => $request->title,
            'uploadfile'                => $uploadFile,
            'filename'                  => $fileName,
        ]);

        // 공지사항에서 썸네일 사용 안함 
        // 썸네일 유효성 검사  
        // if(empty($request->file('thumbnail'))) { 
        //     // 썸네일 첨부파일 없음 
        //     $thumbnail     = 'NULL';
        // }else {
        //     // 썸네일 첨부파일 있음
        //     $fileThumbnail = $request->file('thumbnail');
        //     $fileThumbnailPath = 'storage/images/notice/';
        //     $fileThumbnailName = $getNoticeLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$fileThumbnail->extension();
        //     $fileThumbnail->move(public_path($fileThumbnailPath), $fileThumbnailName);
        //     $thumbnail                      = $fileThumbnailPath.$fileThumbnailName;
        // }
    
        return redirect("admin/notice/list")->with('success', '공지사항 게시글이 추가되었습니다.');
    }

    public function update(Request $request) {
        $notice = Notice::where('id', $request->id)->first();

        return view('admins/notice/update', compact('notice'));

    }

    public function updateForm(Request $request) {

        $getNoticeLastNumber = $request->id;
        if(empty($request->file)) {
            $uploadFile = $request->r_file;
            $fileName = $request->r_filename;
        }else{
            // 첨부파일 있음.
            $file = $request->file('file');                     // 변수 설정 
            $filePath = 'storage/files/notice/';                // 파일 경로 설정 
            $fileFakeName = $getNoticeLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$file->extension();    // 파일명 
            
            $file->move(public_path($filePath), $fileFakeName); // 파일 서버로 이동 
            $fileName = $file->getClientOriginalName();         // 실제 파일 이름
            $uploadFile = $filePath.$fileFakeName;              // 파일 다운받을 때 필요한 파일 이름 
        }

        Notice::where('id', $request->id)->update([
            'body'                      => $request->body,
            'title'                     => $request->title,
            'uploadfile'                => $uploadFile,
            'filename'                  => $fileName,
        ]);
        

        return redirect("admin/notice/list")->with('success', '공지사항 수정이 완료되었습니다.');
    }

    public function delete() {
        $noticeList = Notice::where('is_show', 1)->get();
        
        return view('admins/notice/delete', compact('noticeList'));
    }
}
