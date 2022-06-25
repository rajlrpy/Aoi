<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('frontend.admin.products');
    }
    public function create(){
        return view('frontend.admin.ProductCreate');
    }
    public function store(StoreProductRequest $request){
        Product::create( $request->validated());
        return redirect(route('products.index'))->with('message','success|'.$request->name.' Added Successfully!');

    }
    public function edit(Product $product){
        $data = compact('product');
        return view('frontend.admin.ProductEdit')->with($data);
    }
    public function update(StoreProductRequest $request, Product $product){
        $product->fill($request->validated())->save();
        return redirect(route('products.index'))->with('message','info|'.$product->name.' Updated Successfully! ');
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect(route('products.index'))->with('message','error|Product Deleted Successfully!!');
    }
}
