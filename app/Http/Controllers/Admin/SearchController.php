<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Search;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    // public function search(Request $request)
    // {
    //     Log::info('Search Request Data:', $request->all());
    
    //     $request->validate([
    //         'destination'   => 'required|string',
    //         'checkin_date'  => 'nullable|date',
    //         'checkout_date' => 'nullable|date',
    //         'price_limit'   => 'nullable|integer',
    //         'image'   => 'required|string',
    //     ]);
    
    //     // Build query dynamically
    //     $query = Search::where('destination', 'LIKE', "%{$request->destination}%");
    
    //     if (!empty($request->checkin_date)) {
    //         $query->whereDate('check_in', '=', $request->checkin_date);
    //     }
    
    //     if (!empty($request->checkout_date)) {
    //         $query->whereDate('check_out', '=', $request->checkout_date);
    //     }
    
    //     if (!empty($request->price_limit)) {
    //         $query->where('price_limit', '<=', $request->price_limit);
    //     }
    
    //     $searchResults = $query->get();
    
    //     Log::info('Search Query Results:', $searchResults->toArray());
    
    //     if ($searchResults->isEmpty()) {
    //         return response()->json([
    //             'message' => 'No results found.',
    //             'data' => []
    //         ], 200);
    //     }
    
    //     return response()->json([
    //         'message' => 'Search completed successfully!',
    //         'data' => $searchResults
    //     ]);
    // }
    
public function search(Request $request)
{
    Log::info('Search Request Data:', $request->all());

    $request->validate([
        'destination'   => 'required|string',
        'checkin_date'  => 'nullable|date',
        'checkout_date' => 'nullable|date',
        'price_limit'   => 'nullable|integer',
        'image'         => 'required|string',
    ]);

    // Store the request data in the database
    $search = Search::create([
        'destination'  => $request->destination,
        'check_in'     => $request->checkin_date,
        'check_out'    => $request->checkout_date,
        'price_limit'  => $request->price_limit,
        'image'        => $request->image,
    ]);

    Log::info('Stored Search Entry:', $search->toArray());

    // Return a success response
    return response()->json([
        'message' => 'Search stored successfully!',
        'data'    => $search
    ]);
}

    // public function search(Request $request)
    // {
    //     $request->validate([
    //         'destination'   => 'required|string|max:255',
    //         'checkin_date'  => 'required|date',
    //         'checkout_date' => 'required|date|after_or_equal:checkin_date',
    //         'price_limit'   => 'required|numeric|min:0',
    //         'image'   => 'required|string',
    //     ]);
    
    //     // Example response (Replace with actual API call)
    //     $data = [
    //         [
    //             "destination" => $request->destination,
    //             "checkin_date" => $request->checkin_date,
    //             "checkout_date" => $request->checkout_date,
    //             "price_limit" => $request->price_limit,
    //              "image" => $request->image
    //         ]
    //     ];
    
    //     return response()->json($data);
    // }

   

public function fetchTours(Request $request)
{
    $apiUrl = 'https://hotels4.p.rapidapi.com/properties/get-hotel-photos?id=1178275040';

    $apiKey = env('RAPIDAPI_KEY'); // Get API key from .env

    $response = Http::withHeaders([
        'x-rapidapi-host' => 'hotels4.p.rapidapi.com',
        'x-rapidapi-key' => $apiKey,
    ])->get($apiUrl, [
        'id' => '1178275040'
    ]);

    if ($response->successful()) {
        return response()->json($response->json());
    } else {
        return response()->json([
            'error' => 'Failed to fetch data',
            'status_code' => $response->status(),
            'response' => $response->body()
        ], 500);
    }
}

}