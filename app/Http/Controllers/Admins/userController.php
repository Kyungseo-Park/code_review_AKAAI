<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    public function list() {
        $users = User::get();
        return view('admins/user/list', compact('users'));
    }

    public function update($id) {

        $userId = User::where('id', $id)->first();
        
        // 관리자로 
        if($userId->auth == 0){
            User::where('id', $id)->update(['auth' => 9]);
            $message = '관리자 권한이 부여되었습니다.';
            $state = 'success'; 
        }else {
            User::where('id', $id)->update(['auth' => 0]);
            $message = '권한이 제거되었습니다';
            $state = 'success'; 
        }

        return redirect("admin/user/list")->with($state, $message);
    }

    public function delete($id) {

        $test = User::where('id', $id)->delete();
        $message = '계정이 삭제 되었습니다.';
        $state = 'success'; 
        
        
        return redirect("admin/user/list")->with($state, $message);
    }


}
