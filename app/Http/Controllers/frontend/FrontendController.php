<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Search;
use App\Models\Content;
use App\Models\Destination;
use App\Models\Booking;
use App\Services\MethodService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
class FrontendController extends Controller
{

    protected $methodService;

    public function __construct(MethodService $methodService)
    {
        $this->methodService = $methodService;
    }

    public function index(MethodService $methodService){
       
        $homeContent = Content::where('slug', 'home')->where('status', 1)->first();

        if ($homeContent) {
    
         $homeContent->details = $methodService->processShortcodes($homeContent->details);
         \Log::info('Processed Home Content with Shortcodes:', ['details' => $homeContent->details]);
    
          } else {
            // Fallback if no home content exists
            $homeContent = (object) ['details' => 'No content found.'];
        }

        $search= Search::all();

      
        return view('frontend.index',compact('search','homeContent'));
    }

    public function HotelPage(Request $request)
    {
       // dd($request->all());
        // Retrieve form data
        $hotel= Search::all();
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
        return view('frontend.hotel', compact('destination', 'checkin_date', 'checkout_date', 'price_limit','hotel'));
    }
    

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
{

    // $request->validate([
    //     'destination_id' => 'required|exists:destinations,id',
    //     'name' => 'required|string|max:255',
    //     'email' => 'required|email',
    //     'phone' => 'required|string|max:20',
    //     'travel_date' => 'required|date|after:today',
    // ]);

    Booking::create([
        'destination_id' => $request->destination_id,
        'name' => $request->name,
        'email' => $request->email,
        'City' => $request->City,
        'person' => $request->person,
        'phone' => $request->phone,
        'travel_date' => $request->travel_date,
    ]);
  
    return redirect()->back()->with('success', 'Booking request sent successfully!');
}



public function About(){

    //$contents= Content::where('id', 5)->first();
        //$contents = Content::where('status', 1)->find(5) ?? (object) ['details' => 'No content found.'];
            //  dd($contents);
            // $contents = Content::where('status', 1)->get();
            $contents = Content::where('status',1)->where('id', 5)->get();
        return  view('frontend.about',compact('contents'));
    }
    
    
}
