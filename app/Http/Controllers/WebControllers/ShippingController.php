<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Billing;
use App\Models\Shipdetails;
use App\Models\User;

class ShippingController extends Controller
{
    public function form()
    {
        $categories = Category::all();
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id )->get();
        }else{
            $users_id = Auth::user();
            $carts = Cart::where('user_id', $users_id )->get();
        }
        $settings = DB::table('settings')->get() ;
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }
        return view('user.pages.shipping_add',compact('categories', 'setting','carts'));
    }

    public function ship_store(Request $request)
    {
        $foruserid = Auth::user();
        $user_id = $foruserid->id;
        $user_exist = Shipdetails::where('rcv_uid',$user_id)->get('id')->first();
        if($user_exist){
            $ship =Shipdetails::find($user_exist)->first();
            $ship->rcv_name = $request->name;
            $ship->rcv_uid = $foruserid->id;
            $ship->rcv_email = $request->email;
            $ship->rcv_phone = $request->phone;
            $ship->rcv_add = $request->add;
            $ship->rcv_city = $request->city;
            $ship->rcv_district = $request->district;
            $ship->zip_code = $request->zip;
            $ship->save();
            return redirect('/checkout');
        }
        else{
            $ship = new Shipdetails();
            $ship->rcv_name = $request->name;
            $ship->rcv_uid = $foruserid->id;
            $ship->rcv_email = $request->email;
            $ship->rcv_phone = $request->phone;
            $ship->rcv_add = $request->add;
            $ship->rcv_city = $request->city;
            $ship->rcv_district = $request->district;
            $ship->zip_code = $request->zip;
            $ship->save();
            return redirect('/checkout');
      }
    }

}
