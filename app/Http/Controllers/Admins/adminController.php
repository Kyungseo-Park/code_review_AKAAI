<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\MainThumbnail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{

    public function login() {   
        if(Auth::check()) {
            return view('admins/dashboard');
        }

        return view('login/view');
    }

    public function loginForm(Request $request ) {
        $user = User::where('email', $request->email)->first();

        if($user != null) {
            if(decrypt($user->password) == $request->password) {
                Auth::login($user);
                return redirect("admin")->with('success', '로그인 되었습니다.');    
            }

            return redirect("admin")->with('warning', '입력하신 비밀번호가 잘못되었습니다.');    
        } else {
            return redirect("admin")->with('warning', '없는 계정입니다.');    
        }
    }

    public function registerView() {
        $user = User::where('password', encrypt($request->password))
                    ->where('email', $requset->email)
                    ->first();
        
        return view('register/view');
    }

    public function register(Request $request) {
        $naver_id = Str::random();
        
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'naver_id' => $naver_id,
            'password'=> encrypt($request->password)
        ]);

        return redirect("/admin/user/list")->with('success', '계정이 생성되었습니다.');    
    }


    public function adminDashboard() {
        
        return view('admins/dashboard');
    }

    // 썸네일 List 
    public function thumbnailList() {
        
        $mainThumbnailList = MainThumbnail::where('is_show', 0)->orderByDesc('order')->orderByDesc('created_at')->get();
        return view('admins/thumbnail/list', compact('mainThumbnailList'));
    }

    // 썸네일 추가 
    public function thumbnailCreate(Request $request) {
        
        $insertFire = array();
        $state_img = array('default_');
        $i = 0;
        foreach($request->file('src_img') as $file) {
            $insertFire[$i]['fake_name']        = $state_img[$i].date("Ymdhis", time()).Str::random().'.'.$file->extension();             // 서버 파일명
            $insertFire[$i]['path']             = "storage/images/thumbnail/";                               // 경로 
            $insertFire[$i]['fileupload']       = $file->move(public_path($insertFire[$i]['path']), $insertFire[$i]['fake_name']);
            $i++;
        }

        $src_default    = $insertFire[0]['path'].$insertFire[0]['fake_name'];
        
        // 중간에 우선순위가 추가될 경우 
        $order = $request->order;
        $originOrders = MainThumbnail::where('order', '>=', $order)->get();

        foreach($originOrders as $originOrder) {
            MainThumbnail::where('id', $originOrder->id)->update([
                'order' => $order+1
            ]);

            $order++;
        }
            
        MainThumbnail::create([
            'title'         => $request->title,
            'subtitle'      => $request->subtitle,
            'button'        => $request->button,
            'src_pc'        => 'NULL',
            'src_tablet'    => 'NULL',
            'src_mobile'    => 'NULL',
            'src_default'   => $src_default,
            'order'         => $request->order,
            'href'          => $request->href,
        ]);

        
        return redirect("admin/thumbnail/list")->with('success', '썸네일 추가 완료되었습니다.');
    }

    public function thumbnailState($id) {
        $mainThumbnailId = MainThumbnail::where('id', $id)->first();
        
        // 공개글을 비공개로  
        if($mainThumbnailId->is_show == 0){
            // order보다 값이 큰 것들
            $order = $mainThumbnailId->order;                                   // 선택된 값의 order
            $hightOrders = MainThumbnail::where('order', '>', $order)->get();   // 삭제될 값보다 큰 값을 선택 
            foreach($hightOrders as $hightOrder) {
                MainThumbnail::where('id', $hightOrder->id)->update([
                    'order' => $order
                ]);
                $order = $order + 1;
            }

            // 삭제될 값을 비공개 상태로 전환 
            MainThumbnail::where('id', $id)->update([
                'is_show' => 1,
                'order' => NULL
            ]);
            
            $message = $id.'번 글이 삭제 되었습니다.';
            $state = 'warning'; 

        // 비공개글을 공개로 
        }else if($mainThumbnailId->is_show == 1){
            // 현재 공개중인 값의 가장 큰 수를 찾음 
            $originOrder = MainThumbnail::where('is_show', 0)->OrderByDesc('order')->first();
            // dd($originOrder->order);

            if($originOrder == NULL){
                $orderPoint = 1;
            } else {
                $order = 1;
                $hightOrders = MainThumbnail::where('order', '>=', $order)->get();   // 삭제될 값보다 큰 값을 선택 
                foreach($hightOrders as $hightOrder) {
                    MainThumbnail::where('id', $hightOrder->id)->update([
                        'order' => $order
                    ]);
                    $order = $order + 1;
                }
            }
            
            // 현재 값을 마지막 순위로 이동 
            MainThumbnail::where('id', $id)->update([
                'is_show' => 0,
                'order' => 1
            ]);

            $message = $id.'번 글이 공개 되었습니다.';
            $state = 'success'; 
        }

        return redirect("admin/thumbnail/list")->with($state, $message);
    }

    public function thumbnailPost(Request $request) {

        $old_order = MainThumbnail::where('id', $request->id)->first();
        $another_id = MainThumbnail::where('order', $request->order)->first();

        // 변경사항이 있나?
        if($old_order->order == $request->order) {
            $order = $request->order;

        // 다른 애랑 켭치나?
        } else if($another_id->order == $request->order) {
            MainThumbnail::where('id', $another_id->id)->update([
                'order' => $request->order + 1
            ]);

            $order = $request->order;
        } else {
            // 안겹치냐 
            $order = $request->order;
        }


        if($request->src_img == NULL) {
            $src_default = $request->r_src_default;
        } else {
            $insertFire = array();
            $state_img = array('default_');
            $i = 0;
            foreach($request->file('src_img') as $file) {
                $insertFire[$i]['fake_name']        = $state_img[$i].date("Ymdhis", time()).Str::random().'.'.$file->extension();             // 서버 파일명
                $insertFire[$i]['path']             = "storage/images/thumbnail/";                               // 경로 
                $insertFire[$i]['fileupload']       = $file->move(public_path($insertFire[$i]['path']), $insertFire[$i]['fake_name']);
                $i++;
            }
            $src_default    = $insertFire[0]['path'].$insertFire[0]['fake_name'];
        }


        MainThumbnail::where('id', $request->id)->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button' => $request->button,
            'href' => $request->href,
            'src_default' => $src_default,
            'order'  => $order
        ]);

        $message = $request->id.'번 글이 수정 되었습니다.';
        $state = 'success'; 
        
        return redirect("admin/thumbnail/list")->with($state, $message);
    }

    public function delete() {
        $mainThumbnailList = MainThumbnail::where('is_show', 1)->orderByDesc('order')->orderByDesc('created_at')->get();
        return view('admins/thumbnail/delete', compact('mainThumbnailList'));
    }
}
