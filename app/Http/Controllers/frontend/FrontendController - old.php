<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Search;
use App\Models\Destination;
use App\Models\Booking;
use App\Models\Category;
class FrontendController extends Controller
{
    public function index(){

        $search= Search::all();

      
        return view('frontend.index',compact('search'));
    }

    public function HotelPage(Request $request)
    {
       // dd($request->all());
        // Retrieve form data
        $destination = $request->input('destination');
        $checkin_date = $request->input('checkin_date');
        $checkout_date = $request->input('checkout_date');
        $price_limit = $request->input('price_limit');
    
        // Redirect to the GET route with query parameters
        // return redirect()->route('hotel.get', [
        //     'destination' => $destination,
        //     'checkin_date' => $checkin_date,
        //     'checkout_date' => $checkout_date,
        //     'price_limit' => $price_limit
        // ]);
        return view('frontend.hotel', compact('destination', 'checkin_date', 'checkout_date', 'price_limit'));
    }
    

    // public function HotelPage(Request $request)

    // {
    //     $destination = $request->query('destination');
    //     $checkin_date = $request->query('checkin_date');
    //     $checkout_date = $request->query('checkout_date');
    //     $price_limit = $request->query('price_limit');

    //     // return view('frontend.hotel', compact('destination', 'checkin_date', 'checkout_date', 'price_limit'));
    //     return redirect("/hotel?destination=$destination&checkin_date=$checkin_date&checkout_date=$checkout_date&price_limit=$price_limit");

    //     // return view('frontend.hotel', compact('destination', 'checkin_date', 'checkout_date', 'price_limit')). "?destination=$destination&checkin_date=$checkin_date&checkout_date=$checkout_date&price_limit=$price_limit";;
    // }



    // public  function Destview($cate_slug, $slug){

    //     $category= Category::where('slug',$cate_slug)->where('status','0')->first();

    //     if($category)
    //     {
    //         $dest = Destination::where('cate_id', $category->id)
    //         ->where('slug', $slug)->where('status','0')->first();

    //         if($dest){
    //         return redirect('frontend.destination',compact('dest'));
    //         }
    //         else{
                
    //         }
    //     }

    //     $dest = Destination::all();
    //     return view('frontend.destination',compact('dest'));
    // }




// public function viewcategory($slug)
// {
//     $category = Category::where('slug', $slug)->where('status', '0')->first();

//     if ($category) {
//         // Fetch destinations under the category
//         $dest = Destination::where('cate_id', $category->id)->where('status', '0')->get(); // Use get() instead of first()

//         return view('frontend.destination_details', compact('dest', 'category'));
//     } else {
//         return redirect('/')->with('error', 'Category not found.');
//     }
// }


    public  function Destview(){
        
       // $category = Category::where('slug' $slug)->where('status','0')->first();

         $dest = Destination::all();
         $category = Category::where('status', '0')->first();

        return view('frontend.destination',compact('dest','category'));
    }






    public function Destdetails($cateSlug, $locatSlug)
{
    $category = Category::where('slug', $cateSlug)->first();
    $location = Destination::where('slug', $locatSlug)->first();

    if (!$location) {
        return redirect('/')->with('error', 'Location not found.');
    }

    return view('frontend.destination_details', compact('category', 'location'));
}

public function bookDestination(Request $request)
{     // dd($request->all()); // This will dump and die the form data
    $request->validate([
        'destination_id' => 'required|exists:destinations,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'travel_date' => 'required|date|after:today',
    ]);

    // Save booking to database (You can create a Booking model)
    Booking::create([
        'destination_id' => $request->destination_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'travel_date' => $request->travel_date,
    ]);

    return redirect()->back()->with('success', 'Booking request sent successfully!');
}

    
    
}
