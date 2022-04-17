<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    //
    public function index(){
        return view('admin.product.index');
    }

    public function addProduct(){
        $categories = ProductCategory::all();
        return view('admin.product.add')->with(compact('categories'));
    }

    public function editProduct($id){
        $product = Product::find($id);
        $categories = ProductCategory::all();
        return view('admin.product.edit',compact('product', 'categories'));
    }

    public function detailProduct($id){
        $product = Product::with(['product_images', 'product_category_details'])->where('id','=',$id)->get()->first();
        $categories = ProductCategory::all();
        return view('admin.product.detail')->with(compact('product', 'categories'));
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        $temp_name = $product->product_name;
        $product->delete();
        return view('admin.product.index')->with('success', 'Data produk '. $temp_name . ' berhasil didelete!');
    }

    public function saveProduct(Request $request){
       
        $request->validate([
            "product_name" => "required",
            "price" => "required|numeric",
            "category_id" => "required",
            "gambar" => "required",
        ]);
        
        $fileName = $request->gambar->getClientOriginalName();
        $file = $request->file('gambar');
        Storage::disk('asset')->put('asset/product/'.$fileName, file_get_contents($file));


        $product= new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->product_rate = 5;
        $product->stock = 0;
        $product->gambar = $fileName;
        $product->save();


        return redirect('admin/products')->with('success', 'Data produk '. $product->product_name . ' berhasil ditambahkan!');
    }

    public function saveEditProduct(Request $request,$id){
       
        $request->validate([
            "product_name" => "required",
            "price" => "required|numeric",
            "stock" => "required|numeric",
            "category_id" => "required",
        ]);
        $product= Product::find($id);
        if(is_null($request->gambar)){
            $product->product_name = $request->product_name;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->product_rate = $product->product_rate;
            $product->stock = $request->stock;
            $product->gambar = $product->gambar;
            $product->update();
        }else{
            Storage::disk('asset')->delete('asset/product/'.$product->product_name);
            $fileName = $request->gambar->getClientOriginalName();
            $file = $request->file('gambar');
            Storage::disk('asset')->put('asset/product/'.$fileName, file_get_contents($file));

            $product->product_name = $request->product_name;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->product_rate = $product->product_rate;
            $product->stock = $request->stock;
            $product->gambar = $fileName;
            $product->update();
        }

        return redirect ('admin/products')->with('success', 'Data produk '. $product->product_name . ' berhasil diedit!');
    }


    public function addImageProduct($id, Request $request){

        $request->validate([
            "gambar" => "required",
        ]);

        $product = Product::find($id);

        $fileName = $request->gambar->getClientOriginalName();
        $file = $request->file('gambar');
        Storage::disk('asset')->put('asset/product/'.$product->id.'/'.$fileName, file_get_contents($file));

        $product_image= new ProductImage();
        $product_image->product_id = $product->id;
        $product_image->image_name = $request->gambar->getClientOriginalName();
        $product_image->save();
        return redirect()->back();
    }

    public function deleteImageProduct($id){

        $img = ProductImage::find($id);
        $product = Product::find($img->product_id);

        Storage::disk('asset')->delete('asset/product/'.$product->product_name.'/'.$img->image);

        // // dd($data);
        $img->delete();
        return redirect()->back();
    }
}
