<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductdetailsController extends Controller
{
    // public function index($id){
    //     $sizes = Size::all();
    //     $colors = Color::all();
    //     $categories = Category::all();
    //     $products = Product::where('status',1)->get();
    //     $carts = Cart::all();
    //     $settings = DB::table('settings')->get() ;
    //     $setting = array();
    //     foreach ($settings as $key => $value) {
    //         $setting[$value->name] = $value->value;
    //     }

    //     $result['setting'] = $setting;

    //     $data = [
    //         'setting' => $setting ,
    //     ] ;

    //     $hotdeal = Product::where('hot_deal',1)->get();
    //
    // }

    public function viewdetails($id){
        $settings = DB::table('settings')->get() ;
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }

        $result['setting'] = $setting;

        $data = [
            'setting' => $setting ,
        ] ;

        $products = Product::findOrFail($id);
        $sizes = Size::find($products->size);
        $categories = Category::all();
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id )->get();
        }else{
            $users_id = Auth::user();
            $carts = Cart::where('user_id', $users_id )->get();
        }


        return view('user.pages.productdetails',compact('products','setting','categories', 'carts','sizes'));
    }
}
