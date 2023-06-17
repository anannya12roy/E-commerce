<?php

namespace App\Http\Controllers;

use App\Models\Hotdeal;
use App\Models\Page;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function login()
    {

        return view('user.login');
    }

    public function home()
    {

        $categories = Category::all();
        $hotdeals = Hotdeal::all();
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        } else {
            $users_id = Auth::user();
            $carts = Cart::where('user_id', $users_id)->get();
        }
        $products = Product::orderBy('id', 'DESC')->limit(6)->get();
        $settings = DB::table('settings')->get();
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }

        $result['setting'] = $setting;

        $data = [
            'setting' => $setting,
        ];
        // $topsell = Order::with('products')->orderBy('id', 'DESC')->get();

        $topsell = Order::where('product_id', 'qty')->count('qty')->get();
        dd($topsell);
        $topsell = Order::with('products')->get()->sortBy(function ($order) {
            return $order->products->count();
        });
        return view('user.home', compact('categories', 'hotdeals', 'carts', 'setting', 'products', 'topsell'));
    }
    public function frontpage()
    {

        $categories = Category::all();
        $hotdeals = Hotdeal::all();
        $hotdeal = Product::where('hot_deal', 1)->get();

        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        } else {
            $users_id = Auth::user();
            $carts = Cart::where('user_id', $users_id)->get();
        }

        $products = DB::table('products')
            ->orderBy('products.id', 'DESC')
            // ->leftJoin('categories', 'products.category', '=', 'categories.name')
            ->get();

        //
        // if(Auth::user()){
        //     $user_id = Auth::user()->id;
        //     $carts = Cart::where('user_id', $user_id )->get();
        // }else{
        //     $users_id = Auth::user();
        //     $carts = Cart::where('user_id', $users_id )->get();
        // }


        //

        // $category = Category::orderBy('id', 'desc')->first();

        //        $topsales = DB::table('carts')
        //            ->leftJoin('products','products.id','=','carts.product_id')
        //            ->select('products.id','products.name','carts.product_id',
        //                DB::raw('SUM(carts.quantity) as total'))
        //            ->groupBy('products.id','carts.product_id','products.name')
        //            ->orderBy('total','desc')
        //            ->limit(6)
        //            ->get();

        $settings = DB::table('settings')->get();
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }

        $result['setting'] = $setting;

        $data = [
            'setting' => $setting,
        ];
        // $topsell = Order::where('product_id', 'qty')->count();
        // $topsell = Order::groupBy('product_id')->
        //     select([
        //         'qty'
        //     ])->sum('qty');
        //     dd($topsell);

    //     $topsell= Order::withCount(['product' => function ($query) {
    //         $query->orderBy('qty', 'desc');
    // }])->take(5)->get();
    // $topsell = Order::groupBy('product_id')->select('product_id', 'qty')->selectRaw('product_id,SUM(qty) as totalqty')->get();
    // dd($topsell);



        return view('user.home', compact('categories', 'hotdeals', 'hotdeal', 'carts', 'setting', 'products', 'topsell'));
    }
    public function hotdeal($name)
    {
        $categories = Category::all();
        $settings = DB::table('settings')->get();
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }
        $result['setting'] = $setting;

        $data = [
            'setting' => $setting,
        ];
        $carts = Cart::all();
        $hotdeals = Hotdeal::all();
        $hotdealshops = Product::all()->where('hot_deal', 1);

        return view('user.pages.hotdeal_product', compact('categories', 'hotdeals', 'carts', 'hotdealshops', 'setting'));
    }
}
