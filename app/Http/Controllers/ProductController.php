<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ProductRequest;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function create(){
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.product.create',compact('categories','sizes', 'colors'));
    }

    public function store(ProductRequest $request){
        $request->validated();
        $product = new Product();
        $product->name = $request->name;
        $product->category = $request->category;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->price = $request->price;
        $product->discount_price= $request->discountprice;
        $product->description = $request->description;

        $images = array();
        if($files =$request->file('file')){
            $i = 0;
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $fileNameExtract = explode('.',$name);
                $filename =  $fileNameExtract[0];
                $filename.=time();
                $filename.=$i;
                $filename.='.';
                $filename.=$fileNameExtract[1];
                $file->move('image',$filename);
                $images[]=$filename;
                $i++;

            }

            $product['image']=implode("|",$images);
            $product ->save();
            return redirect()->back();
        }else{
            echo "error";
        }
        $product ->save();
        return redirect()->back();
    }

    public function index(){

        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->back();
    }

    public function chng_stts(Request $request){

        DB::table('products')->where('id',$request->id)->update([
            'status'=>$request->status
         ]);
         return response()->json([
            'code'=>'200',
            'message'=>'status changed successfully',
         ]);

       }

    public function chng_deals(Request $request){

        DB::table('products')->where('id',$request->id)->update([
            'hot_deal'=>$request->hotdeals
         ]);
         return response()->json([
            'code'=>'200',
            'message'=>'Hotdeal changed successfully',
         ]);

       }

       public function edit($id){
        $categories = Category::all();
        $sizes = Size::all();

        $size = Size::find($id);
        $colors = Color::all();
        $color = Color::find($id);

        $product = Product::find($id);

        return view('admin.product.edit',compact('product','categories','sizes','size', 'color','colors'));
    }

    public function update(Request $request,$id){
        // dd($request->all());
        $product =  Product::find($id);
        $product->name = $request->name;
        $product->category = $request->category;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->price = $request->price;
        $product->discount_price= $request->discountprice;
        $product->description = $request->description;

        $images = array();
        if($files =$request->file('file')){
            $i = 0;
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $fileNameExtract = explode('.',$name);
                $filename =  $fileNameExtract[0];
                $filename.=time();
                $filename.=$i;
                $filename.='.';
                $filename.=$fileNameExtract[1];
                $file->move('image',$filename);
                $images[]=$filename;
                $i++;

            }
            $product['image']=implode("|",$images);
            $product ->save();

        }else{
            echo "error";
        }
        $product ->save();



        return redirect()->back();
    }
}
