<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Billing;
use App\Models\Shipdetails;
use App\Models\User;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // $orders= Order::all();
        // $date = Carbon::now()->format('Y-m-d');
        // $orders = Order::when($request->date !=null, function($q) use($request) {
        //     return $q->whereDate('created_at',$request->date);
        // }, function($q) use($date){
        //     return $q->whereDate('created_at',$date);
        // })->when($request->status !=null,function($q) use($request) {
        //     return $q->where('delivery_status',$request->status);
        // }, function($q) {
        //     return $q;
        // })->get();
        // dd($request);
        // $date = trim($request->query('date'));
        // $status = trim($request->query('status'));
        // $orders = Order::where($date , function($q) use($request) {
        //         return $q->whereDate('created_at',$request->query('date'));
        //     })->when($status, function($q) use($request) {
        //         return $q->whereDate('delivery_status', $request->query('status'));
        //     })->get();
        // dd($request);
        $orders = Order::query();
        if(trim($request->date)){
            $orders = $orders->whereDate('created_at', trim($request->date));
        }
        if(trim($request->status)){
            $orders = $orders->where('delivery_status',$request->status);
        }
        $orders = $orders->get();

        return view('admin.order.index',compact('orders'));
    }
    public function sync($id)
    {

        $order = Order::find($id);
        $order-> delivery_status ='Synced';
        $order->save();

         return redirect()->back();
    }

    public function update($id)
    {

        $order = Order::find($id);
        $order-> delivery_status  = 'Delivered';
        $order->save();

         return redirect()->back();
    }
    public function cancel($id)
    {
        $order = Order::find($id);
        $order-> delivery_status  = 'Cancel';
        $order->save();

         return redirect()->back();

    }

    public function cancelbyuser($id)
    {
        $order = Order::find($id);
        $order-> delivery_status  = 'Cancel by user';
        $order->save();

         return redirect()->back();

    }


    public function user_all_order(){

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

        return view('user.pages.order',compact('categories', 'setting','carts'));
    }

    public function cod_order(Request $request){
        $user = Auth::user();
        $userid = $user->id;


    $sdata = Shipdetails::where('rcv_uid',$userid)->first();
    // dd($sdata);
        $udata = Cart::where('user_id',$userid)->get();

    // dd($sdata);

    foreach($udata as $data){
        $order = new Order;
        $order->name = $sdata->rcv_name;
        $order->email = $sdata->rcv_email;
        $order->phone = $sdata->rcv_phone;
        $order->zip_code = $sdata->zip_code;
        $order->address = $sdata->rcv_add;
        $order->city = $sdata->rcv_city;
        $order->district = $sdata->rcv_district;
        $order->user_id = $sdata->rcv_uid;
        $order->product_name = $data->product_name;
        $order->product_id = $data->product_id;
        $order->qty = $data->quantity;
        $order->size = $data->size;
        $order->color = $data->color;
        $order->total_price = $data->total_price;
        $order->base_price = $data->base_price;
        $order->discount_price = $data->discount_price;
        $order->image = $data->image;
        $order->payment_status = 'cash on delivery';
        $order->delivery_status = 'processing';
        $order->save();

        $cart_id = $data->id;
        $cartdlt = Cart::find( $cart_id );
        $cartdlt->delete();

    }

   return redirect()->back();

    }
}
