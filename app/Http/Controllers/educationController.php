<?php

namespace App\Http\Controllers;

use App\Education;
use App\Receipt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class educationController extends Controller
{
    public function list() {
        $educationList = Education::where('is_show', 0)->orderBy('id', 'desc')->paginate(10);

        return view('education/list', compact('educationList'));
    }

    public function show($id) {
        
        $education = Education::where('id', $id)->first();
        
        
        Education::where('id', $id)->update([
            'number_of_hits' => $education->number_of_hits + 1,
        ]);

        
        return view('education/show', compact('education'));
    }

    public function receipt(Request $request) {

        if(Auth::user() == null) {
            $user = NULL;
        } else {
            $user = Auth::user()->id;
        }

        Receipt::create([
            'user_id'       => $user,
            'tel'           => $request->form_call,
            'class'         => $request->form_class,
            'email'         => $request->form_email,
            'name'          => $request->form_name,
            'education_id'  => $request->project_page
        ]);

        
        $receipt = Receipt::where('user_id', $user)
                            ->where('tel', $request->form_call)
                            ->where('class', $request->form_class)
                            ->where('email', $request->form_email)
                            ->where('name', $request->form_name)
                            ->where('education_id', $request->project_page)
                            ->count();

        if($receipt == 1) {
            return 0;
        }else{
            return 1;
        }

    }
}
