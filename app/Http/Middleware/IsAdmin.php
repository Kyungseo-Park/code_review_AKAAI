<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Log;
use Auth;
use Request;
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // kernel.php 추가 
    public function handle($request, Closure $next) {
        // 로그인 체크 
        if(Auth::user() == null) {
            $log = new Log;
            $log->user_id = '1';
            $log->title = "비회원 : 관리자 페이지 접근 시도";
            $log->message ="IP : ".Request::ip();
            $log->save();
            abort('404');
        }
        

        // 관리자 조건 확인, 로그인 필수 
        $UserRoles = User::where('id', '=', Auth::user()->id)->first()->auth;

        // 관리자 초기화 

        $isAdmin = false;
        if($UserRoles == '9') {
            $isAdmin = true;
        }

        if($UserRoles == '10') {
            $isAdmin = true;
        }

        // 관리 아닐 경우 
        if(!$isAdmin) {
            $log = new Log;
            $log->user_id =Auth::user()->id;
            $log->title = "관리자 페이지 접근 시도";
            $log->message ="IP : ".Request::ip();
            $log->save();

            abort(403, '정상적인 접근이 아니므로 로그 메세지가 서버로 전송되었습니다.');
        }

        return $next($request);
    }
}