<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class DestController extends Controller
{
    public function index(){

        $destination = Destination::all();
        return view('admin.destination.index',compact('destination'));
    }

    public function create(){

        $category =Category::where('status','0')->get();
        return view('admin.destination.create',compact('category'));
    }

    public function store(Request $request){


        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required', // Make sure slug is unique
        ]);
      //dd($request->all());
      
        $destinations = New Destination;
        $destinations->category_id = $request['category_id'];
        $destinations->name = $request['name'];
        $destinations->slug = $request['slug'];
        // $destinations->country = $request['country'];
        // $destinations->city = $request['city'];
        $destinations->description = $request['description'];
        $destinations->average_price = $request['average_price'];

        // $destinations->best_season = $request['best_season'];

         if($request->hasfile('image')){
            $file=$request->file('image');
            // $filename=time().', '.$file->getClientOriginalExtention();
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/destination', $filename);
            $destinations->image = $filename;
         }

        // $destinations->featured = $request['featured'];
        $destinations->meta_title = $request['meta_title'];
        $destinations->meta_keyword = $request['meta_keyword'];
        $destinations->meta_description = $request['meta_description'];

        $destinations->status= $request->status == true ?'1':'0';
        $destinations->created_by = Auth::user()->id;
          // dd( $destinations);
        $destinations->save();
        return redirect('admin/destination/index')->with('message','post created succfully');


    }

    public function edit($des_id){

        $destinations = Destination::find($des_id);
        $category =Category::where('status','0')->get();
        return view('admin.destination.create',compact('category'));
    }

    
    public function update(Request $request, $des_id){


        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts', // Make sure slug is unique
        ]);
      
        $destinations = Destination::find($des_id);
        $destinations->category_id = $request['category_id'];
        $destinations->name = $request['name'];
        $destinations->slug = $request['slug'];
        $destinations->country = $request['country'];
        $destinations->city = $request['city'];
        $destinations->description = $request['description'];
        $destinations->average_price = $request['average_price'];

        $destinations->best_season = $request['best_season'];

         if($request->hasfile('image')){
            $file=$request->file('image');
            $filename=time().''.$file->getClientOriginalExtention();
            $file->move('upload/destination',$filename);
            $destinations->image = $filename;
         }

        $destinations->featured = $request['featured'];

        $destinations->status= $request->status == true ?'1':'0';
        $destinations->created_by = Auth::user()->id;

        $destinations->update();
        return redirect('admin/destination/index')->with('message','post created succfully');


    }

    public function destroy($des_id){

        $destinations = Destination::find($des_id);
        if($destinations){
            $destination="upload/destination".$destinations->image;
            if(FILE::Exists($destination)){
                File::Exists($destination);
            }

            $destinations->delete();

            return redirect('admin.destination.index')->with('message','destination delete');


        }
    }
}
