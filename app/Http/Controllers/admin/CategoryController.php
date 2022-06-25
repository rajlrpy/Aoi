<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories = Category::all();
        return view('frontend.admin.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('frontend.admin.categoryAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreCategoryRequest $request){
        $fileName = "aio-".time().".".$request->file('icon')->getClientOriginalExtension() ;
        $request->file('icon')->storeAs('public/images',$fileName);
        $category = new Category;
        $category->name = $request->name;
        $category->icon = $fileName;
        $category->save();
        return redirect(route('category.index'))->with('message','success|'.$request->name.' Added Successfully!');
    }

    public function show(Category $category){

    }

    public function edit(Category $category){
        return view('frontend.admin.categoryEdit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category){
        $fileName=$category->icon;
        if ($request->hasFile('icon')) {
            $image_path = "/storage/images/".$fileName;  // prev image path
            if( File::exists(public_path($image_path)) ) {
                File::delete(public_path($image_path));
            }
            $fileName = "aio-".time().".".$request->file('icon')->getClientOriginalExtension() ;
            $request->file('icon')->storeAs('public/images',$fileName);
        }
        $category->update(['icon'=>$fileName, 'name'=>$request->name]);
        return redirect(route('category.index'))->with('message','info|'.$category->name.' Updated Successfully! ');
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect(route('category.index'))->with('message','error|Category Deleted Successfully!!');
    }
}
