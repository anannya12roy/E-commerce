<?php

namespace App\Http\Controllers;
use App\Models\Color;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::all();

        return view('admin.color.index', compact('colors'));
    }

    public function create(){

        return view('admin.color.create');
    }

    public function store(Request $request){
        $data = $this->validate($request, [
            'color' => 'required',
            'image' => 'sometimes',
        ]);
        $uploadPath = 'color';
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('images/color'), $filename);
                $data['image'] = $filename;

                if (Color::create($data)) {
                    return redirect()->route('admin.color')
                        ->with('alert', [
                            'type' => 'success',
                            'message' => 'Updated',
                        ]);
                }

            }
    }
    public function edit($id)

    {
        $color = Color::find($id);
        return view('admin.color.edit', compact('color'));

    }
    public function update(Request $request, $id)
    {

        $color = Color::find($id);
        $color->color = $request->color;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/images/color'), $filename);


            $imagePath = public_path('images/color/' . $color->image);
            $color['image'] = $filename;
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
        } else {
            unset($color['image']);
        }
        $color->save();
        return redirect()->route('admin.color')
            ->with('alert', [
                'type' => 'success',
                'message' => 'Updated',
            ]);
    }

    public function destroy($id)
    {
        $color = Color::find($id);
        $imagePath = public_path('images/color/' . $color->image);
//        dd($imagePath);
        if (File::exists($imagePath)) {
            unlink($imagePath);
        }
        $color->delete();

        return redirect()->back();
    }
}
