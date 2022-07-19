<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function browse(){
        $product_data = Product::all();
        $data = [
            'product_data' => $product_data
        ];
        return view('dashboard',$data);
    }

    public function insert(){
        $productTypes = ProductType::all();
        $data = [
            'productTypes' => $productTypes
        ];
        return view('product_insert_form',$data);
    }

    public function insert_action(Request $request){
        $newProduct = new Product();
        $newProduct -> product_type_id = $request ->input('product_type_id');
        $newProduct -> barcode = $request -> input('barcode');
        $newProduct -> name_th = $request -> input('name_th');
        $newProduct -> name_en = $request -> input('name_en');
        $newProduct -> cost = $request -> input('cost');
        $newProduct -> price = $request -> input('price');
        if($request->file('photo')){
            $newProduct->photo = $request->file('photo')->store('public/product_photos');
        }
        $newProduct -> save();

        return redirect('/');
    }

    public function update(Request $request, $product_id){
        $productTypes = ProductType::all();
        $product = Product::find($product_id);
        //$product = Product::where('id',$product_id)->first(); //ทางเลือก
        $data = [
            'productTypes' => $productTypes,
            'product' => $product
        ];
        return view('product_update_form',$data);
    }

    public function update_action(Request $request){
        $newProduct = Product::find($request->input('product_id'));
        $newProduct -> product_type_id = $request ->input('product_type_id');
        $newProduct -> barcode = $request -> input('barcode');
        $newProduct -> name_th = $request -> input('name_th');
        $newProduct -> name_en = $request -> input('name_en');
        $newProduct -> cost = $request -> input('cost');
        $newProduct -> price = $request -> input('price');
        if($request->file('photo')){
            $newProduct->photo = $request->file('photo')->store('public/product_photos');
        }
        $newProduct -> save();

        return redirect('/');
    }

    public function delete(Request $request, $product_id){
        Product::destroy($product_id);
        return redirect('/');

    }
    public function coss()
    {
        return view('coss');
    }
}

