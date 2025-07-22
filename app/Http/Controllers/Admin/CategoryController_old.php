<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\File;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        $category =Category::all();
        
    return view('admin.category.index',compact('category'));


    }

    public function create(){

        return view('admin.category.create');
    }

    public function store(Request $request){

        $category = new Category();
        if($request->hasFile('image'))

        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'. '.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;

        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status')== TRUE ? '1':'0';
        $category->popular = $request->input('popular')== TRUE ? '1':'0';

   $category->meta_title = $request['meta_title'];
   $category->meta_description = $request['meta_description'];
   $category->meta_keyword = $request['meta_keyword'];
   $category ->save();
   return redirect()->back()->with('status','Category Added successfully');

    }

    public function edit($id){

        $category =Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,  $id){

        $category = Category::find($id);

        if($request->hasFile('image'))
        {
            $path ='assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                  File::delete($path);

            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'. '.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status')== TRUE ? '1':'0';
        $category->popular = $request->input('popular')== TRUE ? '1':'0';
        $category->meta_title = $request['meta_title'];
        $category->meta_description = $request['meta_description'];
        $category->meta_keyword = $request['meta_keyword'];
        $category->save();
        return redirect('/dashboard')->with('status','Category Update successfully');

    }

    public function destroy($id){

        $category = Category::find($id);
        if($category->image)
        {
            $path ='assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                  File::delete($path);

            }
         }
             $category->delete();
             return redirect('categories')->with('status','Category Delete successfully');
    }

}
