<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller {
    public function redirectToProviderNaver() {
        return Socialite::driver('naver')->redirect();
    }


    public function handleProviderCallbackNaver() {
        $user = Socialite::driver('naver')->user();

        // 이미 있는 이메일일 경우 기존 이메일정보에 포함시켜 주는 부분
        $chk_email = User::where('email', $user->email)->first();
        if($chk_email){
            User::where('email', $user->email)->update(array('naver_id'=> $user->id));
            Auth::login($chk_email);
            return redirect('/');
        }

        $finduser = User::where('naver_id', $user->id)->first();
        if($finduser){
            Auth::login($finduser);
            return redirect('/home');
        }else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'naver_id'=> $user->id,
                'password'=> encrypt('123456789')
            ]);

            Auth::login($newUser);
            return redirect('/');
        }
    }

    public function logout() {
        
        Auth::logout();
        return redirect('/');
    }
}
