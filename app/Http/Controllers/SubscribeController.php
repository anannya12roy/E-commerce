<?php

namespace App\Http\Controllers;
use App\Models\Subscribe;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use RealRashid\SweetAlert\Facades\Alert;
class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    //{ dd($request->all());
        {
            // return "hi";
            $this->validate($request, [
            'email' => 'required|unique:subscribes,email',
        ]);

        $mytime = Carbon::now();

        DB::table('subscribes')->insert([
            'email' => $request->email,
            'created_at' => $mytime,
        ]);


//        dispatch(new SubscribeMailJob($request->subscribe_email))->delay(now()->addSecond(5));

        return redirect()->back()
            ->with('alert', [
                'type' => 'success',
                'message' => 'Please Check your mail to verify subscription',
            ]);
    }

    public function checkMail(Request $request)
    {
        $getmail = $request->email;
        // $data = DB::table('subscribes')->where('email', '=', $getmail)->first();
        $data = Subscribe::where('email',$getmail)->first();
        // dd($data);

        if($data){
            return response(['message'=>'You Have Already Subscribed','status'=>202],200);
        }else{
            return response(['message'=>'You Are Subscribed','status'=>200],200);
        }


    }
}
