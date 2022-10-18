<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class AdminController extends Controller{
    public function view_category(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request){
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }
    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category Delete Successfully');
    }
    public function view_product(){
        $category = Category::all();
        return view('admin.product',compact('category',$category));
    }
    public function add_product(Request $request){
//        dd($request);
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $image  = $request->product_image;
        $imagename = $image->getClientOriginalName() . time() .'.'. $image->getClientOriginalExtension();
        $request->product_image->move('product',$imagename);
        $product->image = $imagename;
        $product->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }
    public function show_product(){
        $product = Product::all();
        return view('admin.show_product',compact('product',$product));
    }
    public function delete_product($id){
        $product = product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Delete Successfully');
    }
    public function update_product($id){
        $product = product::find($id);
        $category = Category::all();
        return view('admin.update_product',compact('product','category'));
    }
    public function update_product_confirm(Request $request,$id){
        $product = product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $image  = $request->product_image;
        if($image) {
            $imagename = $image->getClientOriginalName() . time() . '.' . $image->getClientOriginalExtension();
            $request->product_image->move('product', $imagename);
            $product->image = $imagename;
        }
        $product->save();
        return redirect()->back()->with('message','Product updated Successfully');
    }
}
