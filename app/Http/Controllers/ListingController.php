<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // show all listing
    public function index(){
        // listings.index = listings/index it equates to the file path
    return view('listings.index',[
        'heading'=>'latest listings',
        'listings'=>Listing::all()
    ]);
    }
//show single listing
    public function show(Listing $listing){
// beware this caused a problem before the listing in the html as if the data wasn't there
// the solution back then was to use this logic instead
// // return view("listing",[
//     'listing'=>Listing::find($id)
// ]);
    // listings.show = listings/show  it equates to the file path
     return view("listings.show",[
        'listing'=>$listing

    ]);

    }


}
