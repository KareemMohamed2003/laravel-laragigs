<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listing
    public function index(Request $request)
    {
        // listings.index = listings/index it equates to the file path

        // request(); a function that gets the info about a request works like
        // request object in node.js
        return view('listings.index', [
            'heading' => 'latest listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
            // how did  the function FilterScope get called here
            // Listing::latest()->filter(request(['tag']))->get()
            // when you want to  add additional constraints to queries and then invoke the get()
            // method to retrieve the results: get should be the last method to be excuted
            // like this latest()->filter()->get()
            // latest()->get() query the  data from the database from latest to oldest
        ]);
    }

    //show single listing
    public function show(Listing $listing)
    {
        // beware this caused a problem before the listing in the html as if the data wasn't there
        // the solution back then was to use this logic instead
        // // return view("listing",[
        //     'listing'=>Listing::find($id)
        // ]);
        // listings.show = listings/show  it equates to the file path
        return view("listings.show", [
            'listing' => $listing

        ]);
    }
    // show create form
    public function create()
    {
        return view("listings.create");
    }

    // store listing  data
    public function store(Request $request)
    {
        // request()?
        // Request $request  : this is called dependency injection .
        // dd($request->all());
        // the validate function take an array which has the name of the fields
        // each field is assigned a rule

        $formFields = $request->validate([
            "title" => "required",
            "company" => ['required', Rule::unique('listings', "company")], // so here we are using the unqiue function from the Rule class which
            //is responsible  for making whatever
            //value that will be given to the company field to be a unique value and not to be repeated in the company column in the
            // listing table it takes the table as a param , and the name of the column in the table as a second parameter
            "location" => "required",
            "website" => "required",
            "email" => ["required", "email"], // this array contains the rules we have for this field when we  want to have more than one rules for our column .
            "tags" => "required",
            "description" => "required"
        ]);

        Listing::create($formFields);
        return redirect("/"); //  if this doesn't redirect us the given route that mean there is a problem
        // with the code about meaning the validate function .
    }
}
