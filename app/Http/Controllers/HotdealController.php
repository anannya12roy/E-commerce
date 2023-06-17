<?php

namespace App\Http\Controllers;

use App\AppTrait\FileTrait;
use App\Facades\AppFacade;
use Illuminate\Http\Request;
use App\Models\Hotdeal;
use App\Models\Page;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class HotdealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // compact('hotdeal')
        $hotdeal = Hotdeal::all();
        return view('admin.hotdeal.index', compact('hotdeal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotdeal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $data = $this->validate($request, [
                'frst_desp' => 'sometimes',
                'scnd_desp' => 'sometimes',
                'image' => 'sometimes',
            ]);
            $uploadPath = 'hotdeal';
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('images/hotdeal'), $filename);
                $data['image'] = $filename;

                if (Hotdeal::create($data)) {
                    return redirect()->route('admin.hotdeal')
                        ->with('alert', [
                            'type' => 'success',
                            'message' => 'Updated',
                        ]);
                }

            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        // $page = Page::find($id);
        $hotdeal = Hotdeal::find($id);
        return view('admin.hotdeal.edit', compact('hotdeal'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $hotdeal = Hotdeal::find($id);
        $hotdeal->frst_desp = $request->frst_desp;
        $hotdeal->scnd_desp = $request->scnd_desp;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/images/hotdeal'), $filename);


            $imagePath = public_path('images/hotdeal/' . $hotdeal->image);
            $hotdeal['image'] = $filename;
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
        } else {
            unset($hotdeal['image']);
        }

        // if ($request->hasFile('image')) {
        //     if (file::exists('public/images/hotdeal/'.$hotdeal->image)) {
        //         file::delete('public/images/hotdeal/'.$hotdeal->image);
        //     }
        //  }


        $hotdeal->save();
        return redirect()->route('admin.hotdeal')
            ->with('alert', [
                'type' => 'success',
                'message' => 'Updated',
            ]);

        // $hotdeal= Hotdeal::where('id',$id)->update([
        //     'frst_desp' => 'sometimes',
        //         'scnd_desp' => 'sometimes',
        //         'image' => 'sometimes',
        // ]);
        // $data=$request->except('_token');
        // $uploadPath= 'hotdeal';

        // if($request->file('image')){
        //     $file= $request->file('image');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('images/hotdeal'), $filename);
        //     $data['image']= $filename;
        // }
        // $hotdeal = Hotdeal::where('id', $id)->first()->update($data);
        // if($hotdeal){
        //     return redirect()->back();
        // }

        // $hotdeal = Hotdeal::find($id);
        // $hotdeal->frst_desp = $request->frst_desp;
        // $hotdeal->scnd_desp = $request->scnd_desp;
        // $hotdeal->image = $request->image;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotdeal = Hotdeal::find($id);
        $imagePath = public_path('images/hotdeal/' . $hotdeal->image);
//        dd($imagePath);
        if (File::exists($imagePath)) {
            unlink($imagePath);
        }
        $hotdeal->delete();

        return redirect()->back();
    }
}
