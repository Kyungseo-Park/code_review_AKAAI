<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UShop;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class shopController extends Controller
{
    public function list() {
        $ushops = UShop::where('is_show', 0)->get();
        return view('admins/shop/list', compact('ushops'));
    }

    public function create() {
        
        return view('admins/shop/create');
    }

    public function state($id) {
        $ushopId = UShop::where('id', $id)->first();
        
        if($ushopId->is_show == 0){
            UShop::where('id', $id)->update(['is_show' => 1]);
            $message = $id.'번 글이 삭제 되었습니다.';
            $state = 'warning'; 
        }else {
            UShop::where('id', $id)->update(['is_show' => 0]);
            $message = $id.'번 글이 공개 되었습니다.';
            $state = 'success'; 
        }

        return redirect("admin/shop/list")->with($state, $message);
    }
    public function createForm(Request $request) {
        if(Auth::user() == null) {
            $user_id = 1;
        } else {
            $user_id = Auth::user()->id;
        }

        // 게시물번호 초기화
        $getUShopLastNumber = UShop::count() + 1;
        
        // 첨부파일 유효성 검사 
        if($request->file('file') == NULL) { 
            // 첨부파일 없음 
            $fileName     = NULL;  
            $uploadFile   = NULL;
        }else {
            // 첨부파일 있음.
            $file = $request->file('file');                     // 변수 설정 
            $filePath = 'storage/files/ushop/';                 // 파일 경로 설정 
            $fileFakeName = $getUShopLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$file->extension();    // 파일명 
            
            $file->move(public_path($filePath), $fileFakeName); // 파일 서버로 이동 
            $fileName = $file->getClientOriginalName();         // 실제 파일 이름
            $uploadFile = $filePath.$fileFakeName;              // 파일 다운받을 때 필요한 파일 이름 
        }

        // 2020. 10. 10 
        // 썸네일 파일 업로드 
        $fileThumbnail = $request->file('thumbnail');
        $fileThumbnailPath = 'storage/images/ushop/';
        $fileThumbnailName = $getUShopLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$fileThumbnail->extension();
        $fileThumbnail->move(public_path($fileThumbnailPath), $fileThumbnailName);
                
        $thumbnail                      = $fileThumbnailPath.$fileThumbnailName;

        UShop::create([
            'thumbnail'         => $thumbnail,
            'title'             => $request->title,
            'href'              => $request->href,
            'body'              => $request->body,
            'uploadfile'        => $uploadFile,
            'filename'          => $fileName,
            'user_id'           => $user_id
        ]);
        
        

        return redirect("admin/shop/list")->with('success', '상설매장 게시물이 추가되었습니다.');
        // return response('admins/shop/create');
    }

    public function update(Request $request) {
        $shop = UShop::where('id', $request->id)->first();
                
        return view('admins/shop/update', compact('shop'));
    }

    public function updateForm(Request $request) {
        $getUShopLastNumber = $request->id;
        // 첨부파일 없음 
        $fileName     = NULL;  
        $uploadFile   = NULL;

        if(empty($request->thumbnail)) {
            $thumbnail = $request->r_thumbnail;
        } else {
            $fileThumbnail = $request->file('thumbnail');
            $fileThumbnailPath = 'storage/images/ushop/';
            $fileThumbnailName = $getUShopLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$fileThumbnail->extension();
            $fileThumbnail->move(public_path($fileThumbnailPath), $fileThumbnailName);
                
            $thumbnail                      = $fileThumbnailPath.$fileThumbnailName;
        }
        
        if(empty($request->file)) {
            $uploadFile = $request->r_file;
            $fileName = $request->r_filename;
        } else {
            $file = $request->file('file');                     // 변수 설정 
            $filePath = 'storage/files/ushop/';             // 파일 경로 설정 
            $fileFakeName = $getUShopLastNumber.'_'.date("Ymdhis", time()).Str::random().'.'.$file->extension();    // 파일명 

            $file->move(public_path($filePath), $fileFakeName); // 파일 서버로 이동 
            $fileName = $file->getClientOriginalName();         // 실제 파일 이름
            $uploadFile = $filePath.$fileFakeName;              // 파일 다운받을 때 필요한 파일 이름 
        }

        UShop::where('id', $request->id)->update([
            'thumbnail'         => $thumbnail,
            'title'             => $request->title,
            'href'              => $request->href,
            'body'              => $request->body,
            'uploadfile'        => $uploadFile,
            'filename'          => $fileName
        ]);

        return redirect("admin/shop/list")->with('success', '상설매장 게시물이 수정되었습니다.');
    }

    public function delete() {
        $ushops = UShop::where('is_show', 1)->get();

        return view('admins/shop/delete', compact('ushops'));
    }
}

