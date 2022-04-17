<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Package;
use App\Models\DetailPackage;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    //
    public function index(){
        return view('admin.packages.index');
    }

    public function addPackage(){
        return view('admin.packages.add');
    }

    public function editPackage($id){
        
        $package = Package::find($id);
        return view('admin.packages.edit',compact('package'));
    }

    public function detailPackage($id){
        $packages = Package::with('detail_packages', 'detail_packages.product')->where('id', '=', $id)->get();
        $products = Product::all();
        return view('admin.packages.detail',compact('products', 'packages'));
        // return $packages;
    }

    public function saveEditPackage(Request $request, $id){
        $request->validate([
            "name" => "required",
            "end_price" =>"required|numeric"
        ]);
        
        Package::where('id','=', $id)
            ->update([
            'name'=> $request->name, 
            'end_price'=> $request->end_price, 
            ]);

        return redirect()->redirect('admin.package.index')->with('success', 'Data package berhasil diedit!');
    }

    public function deleteCategory($id){
        $product = ProductCategory::find($id);
        $product->delete();
        return redirect()->redirect('admin.package.index')->with('success', 'Data package berhasil didelete!');
    }

    public function savePackage(Request $request){
        
        $request->validate([
            "name" => "required",
            "gambar" =>"required",
        ]);
        $fileName = $request->gambar->getClientOriginalName();
        $file = $request->file('gambar');
        Storage::disk('asset')->put('asset/package/'.$fileName, file_get_contents($file));

        $package= new Package();
        $package->name = $request->name;
        $package->gambar = $request->gambar->getClientOriginalName();
        $package->normal_price = 0;
        $package->end_price = 0;
        $package->save();

        return redirect()->route('admin.detail.package', $package->id)->with('success', 'Data package berhasil dicreate!');;
    }


    public function saveProductPackage($id,Request $request){
        
        $request->validate([
            "product_id" => "required",
            "qty" =>"required|numeric",
        ]);

        $product = Product::where('id','=',$request->product_id)->firstOrFail();
        $temp = Package::find($id);
        Package::where('id','=', $id)
            ->update([
            'normal_price'=> $temp->normal_price + ($product->price*$request->qty), 
            ]);
        
        $pp= new DetailPackage();
        $pp->product_id = $request->product_id;
        $pp->qty = $request->qty;
        $pp->sub_total = $product->price*$request->qty;
        $pp->package_id = $id;
        $pp->save();

        return redirect()->route('admin.detail.package', $id)->with('success', 'Data product package berhasil ditambahkan!');;
    }
}
