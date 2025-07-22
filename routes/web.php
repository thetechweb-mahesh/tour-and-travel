<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\frontend\EmailController;
use App\Http\Controllers\Admin\DestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[FrontendController::class,'index']);
Route::get('/search', [FrontendController::class, 'search'])->name('search.tours');
Route::get('/fetch-tours', [SearchController::class, 'fetchTours']);


Route::get('/contact', [EmailController::class, 'sendCustomMail']); // Show the form
// Route::match(['get', 'post'], '/hotel', [FrontendController::class, 'HotelPage']);
// Route::get('category/{slug}',[FrontendController::class,'viewcategory']);
// Route::get('/location/{slug}', [FrontendController::class, 'Destdetails']);

Route::get('category/{cateSlug}/{locatSlug}', [FrontendController::class, 'Destdetails']);
Route::post('/book-destination', [FrontendController::class, 'bookDestination'])->name('book.destination');

Route::get('/about',[FrontendController::class,'About']);

Route::get('/hotel', [FrontendController::class, 'HotelPage'])->name('hotel.get');
Route::get('/destination', [FrontendController::class, 'Destview']);


Route::get('location',[FrontendController::class,'Destdetails']);


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('/dashboard',[DashboardController::class,'index']);
    //content route
    Route::resource('/pages', ContentController::class);
    Route::get('/add-pages', [ContentController::class,'create']);
    // Route::get('/edit-pages/{id}', [ContentController::class,'edit']);
    // Route::get('pages/edit/{id}', [ContentController::class, 'edit']);
    
    Route::post('updatestatus', [ContentController::class, 'updateStatus'])->name('item.updatestatus');


    Route::get('/category',[CategoryController::class,'index']);
    Route::get('/add-category',[CategoryController::class,'create']);
    Route::POST('/add-category',[CategoryController::class,'store']);

    Route::get('/edit-category/{id}',[CategoryController::class,'edit']);
    Route::put('/update_category/{id}',[CategoryController::class,'update']);
    Route::get('/delete_category/{id}',[CategoryController::class,'destroy']);

    //destination 
    
    Route::get('/destination',[DestController::class,'index']);
    Route::get('/add-destination',[DestController::class,'create']);
    Route::POST('/add-destination',[DestController::class,'store']);

    Route::get('/edit-destination/{des_id}',[DestController::class,'edit']);
    Route::put('/update_destination/{des_id}',[DestController::class,'update']);
    Route::get('/delete_destination/{des_id}',[DestController::class,'destroy']);

    //setting 
    Route::get('/settings',[SettingController::class, 'index']);
    Route::post('/settings',[SettingController::class, 'savedata']);

});