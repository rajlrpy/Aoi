<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ProductController extends Controller
{
   
    public function index(){
        
        // return $dataTable->render('frontend.admin.products');

        if(request()->ajax()) {
            $product = Product::with('category');
            return Datatables()->of($product)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                // $btn = '<button  class="edit btn btn-info btn-sm">View</button>';
                $btn = '<a href="javascript:void(0)" class="edit btn btn-secondary btn-sm" >Edit</a> ';
                $btn = $btn.
                // '<Form action="/admin/products/'.$row->id.'"'.'method="POST">'.
                '<form action="'.route('products.destroy',$row->id).'" method="POST">'.
                csrf_field().method_field("DELETE").
                '<button onclick="'."return confirm('Are you sure?')".'" class="btn btn-danger btn-sm " value="submit">Delete</button>'
               .'</Form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('frontend.admin.products');
    }
    public function create(){
        $categories = Category::select('id','name')->get();
        return view('frontend.admin.ProductCreate',compact('categories'));
    }
    public function store(StoreProductRequest $request){
        Product::create( $request->validated());
        return redirect(route('products.index'))->with('message','success|'.$request->name.' Added Successfully!');
    }


    public function edit(Product $product){
        $categories = Category::select('id','name')->get();
        $data = compact('product','categories');
        return view('frontend.admin.ProductEdit')->with($data);
    }
    public function update(UpdateProductRequest $request, Product $product){
        $product->fill($request->validated())->save();
        return redirect(route('products.index'))->with('message','info|'.$product->name.' Updated Successfully! ');
    }
    public function destroy($id){
        Product::find($id)->delete();
        return redirect(route('products.index'))->with('message','error|Product Deleted Successfully!!');

    }

    public function exportxl(){
        // return Excel::download(new ProductExport, 'Products.xlsx');
        // return (new ProductExport)->download('invoices.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        // return Excel::download(new ProductExport, 'Product.pdf',\Maatwebsite\Excel\Excel::DOMPDF);
        return Excel::download(new ProductExport,'invoices.xlsx');
    }
}
