<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        // $hotdeal = Hotdeal::all();
        $categories = Category::all();
        // $settings = DB::table('settings')->get() ;
        // $setting = array();
        // foreach ($settings as $key => $value) {
        //     $setting[$value->name] = $value->value;
        // }

        // $result['setting'] = $setting;

        // $data = [
        //     'setting' => $setting ,
        // ] ;
        return view('user.page',compact('categories'));
    }


    public function findPageBySlug($findSlug)
    {
        $categories = Category::all();
        $carts= Cart::all();
        $settings = DB::table('settings')->get() ;
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }

        $result['setting'] = $setting;

        $data = [
            'setting' => $setting ,
        ] ;
        $pageInfo=Page::where('slug',$findSlug)->first();
        if($pageInfo){
            return view('user.pages.custom-page',compact('categories','pageInfo','setting', 'carts'));
        }

    }
}
