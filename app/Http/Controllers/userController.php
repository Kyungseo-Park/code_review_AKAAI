<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function view() {
        
        return view('user/view');
    }

    public function private() {
        return view('user/private');
    }
}
