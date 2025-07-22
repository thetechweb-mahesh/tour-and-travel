<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function index()
    {
        $content = Content::all();
        return view('admin.pages.index',compact('content'));
    }
    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        // Step 1: Validation (Add necessary rules for each field)
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:contents,slug',
            'subtitle' => 'nullable|string|max:255',
            'details' => '|string',
          
            'img' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         
          
        ]);
    
        // Step 2: Store the content data (non-array fields)
        $content = new Content;
        $content->title = $request->input('title');
        $content->slug = Str::slug($request->input('slug'));
        $content->subtitle = $request->input('subtitle');
        $content->details = $request->input('details');
        $content->extra = $request->input('extra');
        $content->meta = $request->input('meta');
       
        
        // Step 3: Handle the image upload
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/service/'), $filename);
            $content->img = 'uploads/service/' . $filename; // Store the relative file path
        }
    
        // Step 4: Handle meta, extra, faq, and howto arrays (convert to JSON)
        if ($request->has('meta')) {
            $content->meta = json_encode($request->input('meta'));
        }
        if ($request->has('extra')) {
            $content->extra = json_encode($request->input('extra'));
        }
      

        $content->save();
    
    
        return redirect('/admin/pages')->with('message', 'Page created successfully');
    }
    
    

public function edit($id)

{
    $content= Content::find($id);
     // Decode 'extra' and 'meta' JSON fields
     $content->extra = $content->extra ? json_decode($content->extra, true) : [];
     $content->meta = $content->meta ? json_decode($content->meta, true) : [];
   return view('admin.pages.edit',compact('content'));
   
}

// public function show($id){
//     $content= Content::find($id);

//     return view('admin.pages.edit',compact('content'));
// }
public function update(Request $request, $id)
{
    // Step 1: Validate the incoming data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|unique:contents,slug,' . $id,
        'subtitle' => 'nullable|string|max:255',
        'details' => 'nullable|string',
        'banner.title' => 'nullable|string|max:255',
        'banner_subtitle' => 'nullable|string|max:255',
        'meta' => 'nullable|array',
        'meta.title' => 'nullable|string|max:255',
        'meta.key' => 'nullable|string|max:255',
        'meta.description' => 'nullable|string',
        'extra' => 'nullable|array',
        'extra.faq' => 'nullable|array',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'status' => 'nullable|boolean',
    ]);

    // Step 2: Find the content
    $content = Content::findOrFail($id);

    // Step 3: Handle image upload
    if ($request->hasFile('img')) {
        if ($content->img && file_exists(public_path($content->img))) {
            @unlink(public_path($content->img)); // Safely delete the old image
        }
        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);
        $validatedData['img'] = 'images/' . $imageName;
    } else {
        $validatedData['img'] = $content->img; // Retain old image if no new image is uploaded
    }

    // Step 4: Handle `extra` and `meta` JSON fields
    if ($request->has('extra')) {
        $content->extra = json_encode($request->input('extra'));
    }

    if ($request->has('meta')) {
        $content->meta = json_encode($request->input('meta'));
    }

    // Step 5: Update other fields
    $content->title = $validatedData['title'];
    $content->slug = $validatedData['slug'];
    $content->subtitle = $validatedData['subtitle'];
    $content->details = $validatedData['details'] ?? null;
    $content->status = $validatedData['status'] ?? $content->status;
    $content->img = $validatedData['img'];

    // Save the updated content
    $content->update();
      return redirect('admin/pages')->with('message', 'Content updated successfully!');
    // return back()->with('message', 'Content updated successfully!');
}

    
public function updateStatus(Request $request)
{
    $content = Content::find($request->id);
    if($content) {
        $content->status = $request->status;
        $content->save();

        return response()->json(['status' => $content->status]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Unable to update status due to a server error.'
    ]);
    
}

    public function destroy($id)
    {
        $content = Content::findOrFail($id);

        // Delete the associated image file if it exists
        if ($content->img && file_exists(public_path($content->img))) {
            unlink(public_path($content->img));
        }

        $content->delete();

        // return redirect()->route('admin.pages.index')->with('message', 'Page deleted successfully!');
        return redirect()->back()->with('message', 'Page deleted successfully!');
    }
}