<?php

namespace App\Http\Controllers\Admins;

use App\Education;
use App\Receipt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class educationController extends Controller {

    public function list() {
        $educationList = Education::where('is_show', 0)->get();
        
        return view('admins/education/list', compact('educationList'));
    }

    // 게시물 공개 비공개 전환
    public function state($id) {
        $educationId = Education::where('id', $id)->first();
        
        if($educationId->is_show == 0){
            Education::where('id', $id)->update(['is_show' => 1]);
            $message = $id.'번 글이 삭제 되었습니다.';
            $state = 'warning'; 
        }else {
            Education::where('id', $id)->update(['is_show' => 0]);
            $message = $id.'번 글이 공개 되었습니다.';
            $state = 'success'; 
        }
        return redirect("admin/education/list")->with($state, $message);
    }

    public function create() {
        
        return view('admins/education/create');
    }

    public function createForm(Request $request) {
        
        // 게시물번호 초기화
        $getEducationLastNumber = Education::count() + 1;
        
        // 첨부파일 유효성 검사 
        if(empty($request->file('file'))) { 
            // 첨부파일 없음 
            $fileName     = NULL;  
            $uploadFile   = NULL;
        }else {
            // 첨부파일 있음.
            $file = $request->file('file');                     // 변수 설정 
            $filePath = 'storage/files/education/';             // 파일 경로 설정 
            $fileFakeName = $getEducationLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$file->extension();    // 파일명 
            
            $file->move(public_path($filePath), $fileFakeName); // 파일 서버로 이동 
            $fileName = $file->getClientOriginalName();         // 실제 파일 이름
            $uploadFile = $filePath.$fileFakeName;              // 파일 다운받을 때 필요한 파일 이름 
        }

        // dd($uploadFile);
        // 썸네일 추가
        $fileThumbnail = $request->file('thumbnail');
        $fileThumbnailPath = 'storage/images/education/';
        $fileThumbnailName = $getEducationLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$fileThumbnail->extension();
        
        $fileThumbnail->move(public_path($fileThumbnailPath), $fileThumbnailName);
            
        
        $thumbnail                      = $fileThumbnailPath.$fileThumbnailName;
        
        Education::create([
            'thumbnail'                 => $thumbnail,
            'title'                     => $request->title,
            'subtitle'                  => $request->subtitle,
            'body'                      => $request->body,
            'uploadfile'                => $uploadFile,
            'filename'                  => $fileName,
            'recruitment_personnel'     => $request->recruitment_personnel,
            'start_date'                => $request->start_date,
            'end_date'                  => $request->end_date,
        ]);

        return redirect("admin/education/list")->with('success', '교육/세미나 추가 완료되었습니다.');
    }


    // pdf 워드 정상 2020-08-19
    public function fileDownload($id) {
        // 파일을 포함하고 있는 칼람 추적
        $educationId = Education::where('id', $id)->first();

    
        // 실제 파일 명  
        $educationFileName = $educationId->filename;
        // 서버에 올라가 있는 파일 명과 경로 
        $downloadFile = public_path().'\\'.$educationId->uploadfile;
        // 경로 포맷
        $downloadFile = str_replace('/','\\',$downloadFile);
        
        // 파일 확장자 포맷 해줘야 함 
        $ext = pathinfo($educationFileName, PATHINFO_EXTENSION);

        
        if($ext == 'doc' || $ext =='docx' || $ext == 'pdf'){
            $headers = array(
                'Content-Type: application/msword',
                'HTTP/1.1 200 OK',
                'Pragma: public',
            );
        }


        return response()->download($downloadFile, $educationFileName, $headers);
    }

    public function update(Request $request) {
        $education = Education::where('id', $request->id)->first();


        return view('admins/education/update', compact('education'));
    }

    public function updateForm(Request $request) {

        $getEducationLastNumber = $request->id;
        // 첨부파일 없음 
        $fileName     = NULL;  
        $uploadFile   = NULL;

        if(empty($request->thumbnail)) {
            $thumbnail = $request->r_thumbnail;
        } else {
            $fileThumbnail = $request->file('thumbnail');
            $fileThumbnailPath = 'storage/images/education/';
            $fileThumbnailName = $getEducationLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$fileThumbnail->extension();
            $fileThumbnail->move(public_path($fileThumbnailPath), $fileThumbnailName);
                
            $thumbnail                      = $fileThumbnailPath.$fileThumbnailName;
        }
        
        if(empty($request->file)) {
            $uploadFile = $request->r_file;
            $fileName = $request->r_filename;
        }
        
        if(!empty($request->file('file'))) { 
            // 첨부파일 있음.
            $file = $request->file('file');                     // 변수 설정 
            $filePath = 'storage/files/education/';             // 파일 경로 설정 
            $fileFakeName = $getEducationLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$file->extension();    // 파일명 

            $file->move(public_path($filePath), $fileFakeName); // 파일 서버로 이동 
            $fileName = $file->getClientOriginalName();         // 실제 파일 이름
            $uploadFile = $filePath.$fileFakeName;              // 파일 다운받을 때 필요한 파일 이름 
        }

        Education::where('id', $request->id)->update([
            'thumbnail'                 => $thumbnail,
            'title'                     => $request->title,
            'subtitle'                  => $request->subtitle,
            'body'                      => $request->body,
            'uploadfile'                => $uploadFile,
            'filename'                  => $fileName,
            'recruitment_personnel'     => $request->recruitment_personnel,
            'start_date'                => $request->start_date,
            'end_date'                  => $request->end_date,
        ]);

        return redirect("admin/education/list")->with('success', '교육/세미나 수정 완료되었습니다.');
    }

    public function delete() {
        $deleteLists = Education::where('is_show', 1)->get();

        return view('admins/education/delete', compact('deleteLists'));
    }

    public function receipt($id) {

        $receiptLists = Receipt::where('education_id', $id)->get();

        
        return view('admins/education/receipt', compact('receiptLists'));
        

    }

}
