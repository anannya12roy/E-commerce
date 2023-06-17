<?php

namespace App\Http\Controllers;

use App\Models\Hotdeal;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index_page(){
        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }

    public function create_page(){

        return view('admin.page.create');
    }

    public function store_page(Request $request){
        $data = $this->validate($request, [
            'title' => 'sometimes',
            'slug' => 'sometimes',
            'frst_desp' => 'sometimes',
            'scnd_desp' => 'sometimes',
        ]);
        if (Page::create($data)) {
            return redirect()->route('admin.page')->with('alert', [
                'type' => 'success',
                'message' => 'Updated',
            ]);
        }

//        return view('admin.page.index');
    }

    public function edit_page($id){
        $page = Page::find($id);
        return view('admin.page.edit',compact('page'));
    }

    public function update_page(Request $request, $id){

        $page = Page::find($id);
        $page->title = $request->title;
        $page->frst_desp = $request->frst_desp;
        $page->scnd_desp = $request->scnd_desp;
        $page->save();
        return redirect()->route('admin.page')
            ->with('alert', [
                'type' => 'success',
                'message' => 'Updated',
            ]);
    }

    public function destroy_page($id){
        $page = Page::find($id);
        $page->delete();
        return redirect()->route('admin.page');
    }
}
