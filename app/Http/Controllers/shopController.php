<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UShop;

class shopController extends Controller
{
    public function list() {
        $ushopList = UShop::where('is_show', 0)->orderBy('id', 'desc')->paginate(10);
        


        return view('shop/list', compact('ushopList'));
    }

    public function show($id) {
        $shop = UShop::where('is_show', 0)->where('id', $id)->first();

        if($shop == NULL) {
            abort(404);
        }


        $nextPost       = UShop::where('is_show', 0)->where('id', '>' ,$id)->orderBy('id', 'asc')->first();
        $previousPost   = UShop::where('is_show', 0)->where('id', '<' ,$id)->orderBy('id', 'desc')->first();
        
        UShop::where('id', $id)->update([
            'hits' => $shop->hits + 1,
        ]);

        return view('shop/show', compact('shop', 'nextPost', 'previousPost'));
    }
}
