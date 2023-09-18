<?php

use App\Http\Controllers\ListingController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {

//     return view('listings',[
//         'heading'=>'latest listings',
//         'listings'=>Listing::all()
//     ]);
// });

// // single listing
// Route::get("/listings/{id}",function($id){

// // return view("listing",[
// //     'listing'=>Listing::find($id)
// // ]);

// });

// // single listing with Route model binding
// Route::get("/listings/{id}",function(Listing $listing){

// //     return view("listing",[
// //         'listing'=>$listing

// //     ]);

//     });


// routing using controller to show all listings
//
Route::get('/', [ListingController::class,"index"]);
// routing using controller to show single listing
Route::get('/listings/{listing}', [ListingController::class,"show"]);
