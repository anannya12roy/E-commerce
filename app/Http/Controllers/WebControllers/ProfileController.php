<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ProfileController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $profile = User::where('id', $user_id )->first();
        }else{
            $users_id = Auth::user();
        }
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
        ];

        return view('user.profile.profile',compact('setting', 'carts', 'categories'));
    }

    public function profile_update(Request $request)
    {
        $user_id = Auth::user()->id;
        $user=User::where('id',$user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->back();
    }

    public function orders()
    {
        
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $profile = User::where('id', $user_id )->first();
        }else{
            $users_id = Auth::user();
        }
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
        $user = Auth::user()->id;
        $orderlists = Order::where('user_id',$user)->get();
        return view('user.profile.orders',compact('orderlists','setting', 'carts', 'categories'));
    }

    public function bill_add(){

        if(Auth::user()){
            $user_id = Auth::user()->id;
            $profile = User::where('id', $user_id )->first();
        }else{
            $users_id = Auth::user();
        }
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
        ];

        return view('user.profile.billing_add',compact('setting', 'carts', 'categories'));
    }

    public function billaddress_update(Request $request){

        $user_id = Auth::user()->id;
        $user=User::where('id',$user_id)->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip,
            'district' => $request->district,
        ]);
        return redirect()->back();
    }
}
