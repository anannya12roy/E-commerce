<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {

        $settings = DB::table('settings')->get() ;
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }

        $result['setting'] = $setting;

        $data = [
            'setting' => $setting ,
        ] ;
        return view('admin.setting.index')->with($data);
    }

    public function Update(Request $request)
    {


        $index =  $request->all() ;
//
//        if ($request->hasFile('habout_img3')) {
//            $uploadPath = 'admin';
//            $logo_image_id = $this->imageUpload($request, 'habout_img3', $uploadPath, '', 'image');
//            $logo_image_path = DB::table('images')
//                ->where('images.id', '=', $logo_image_id )
//                ->first();
//
//            $logo_image = $logo_image_path->path ;
//            $index['habout_img3'] = $logo_image;
//
//        }
//
//        if ($request->hasFile('habout_img2')) {
//            $uploadPath = 'admin';
//            $fileName = $request->habout_img2->getClientOriginalName();
//            $filePath = 'videos/' . $fileName;
//
//            $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->habout_img2));
//
//            $filePath= 'storage/'.$filePath;
//            $id=DB::table('images')->insertGetId([
//                'image_type' => '1',
//                'height' => 500,
//                'width' => 500,
//                'path' => $filePath,
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ]);
//
//        }

        foreach ($index  as $key => $value) {
            $update_settings = DB::table('settings')
                ->where('name', '=', $key)
                ->update([
                    'value' => $value
                ]);
        }

        return redirect()->back()
            ->with('')
            ->with('alert', [
                'type' => 'success',
                'message' => 'Settings updated successfully',
            ]);

    }
}
