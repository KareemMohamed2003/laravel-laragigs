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
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(2)  // the paginate function divdes the data queries into pages each page will have 2 items of the data returned from the query 

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
        if ($request->hasFile("logo")) {   // so first we check if there is a file uploaded in the input field with the name logo 

            // $formFields["logo "]=$request->file("logo") adds the path obtained from the file input to the logo column in the database  then finally file("logo")->store("logos","public")
            // uploads the file to the folder logos which will get created for us probably in the directory public .  
            $formFields["logo"] = $request->file("logo")->store("logos", "public");
            //quick note : when we store the file path there is an extra step that we need to take
            // in order to be able to access the image file we need to create a link from the storage folder to the public folder 
            // so we just run the artisan command : `php artisan storage:link` 
        }
        Listing::create($formFields);
        return redirect("/")->with("message", 'Listing created successfully'); //  if this doesn't redirect us the given route that mean there is a problem
        // with the code about meaning the validate function .
        //  with("message",'Listing created successfully') now when using this flash message we need somewhere in the view to show it
        // we can create a component to show the message
        // now the ` with ` here is called a helper function ,The with function returns the value it is given


    }


    public function  edit(Listing $listing)
    {
        return view("listings.edit", ["listing" => $listing]);
        // 
    }

    public function update(Request $request, Listing $listing)
    {
        // request()?
        // Request $request  : this is called dependency injection .
        // dd($request->all());
        // the validate function take an array which has the name of the fields
        // each field is assigned a rule

        $formFields = $request->validate([
            "title" => "required",
            "company" => ['required'], // here we remove the Rule::unique('listings', "company") so if we try to submit company your not gonna be able to 
            "location" => "required",
            "website" => "required",
            "email" => ["required", "email"], // this array contains the rules we have for this field when we  want to have more than one rules for our column .
            "tags" => "required",
            "description" => "required"
        ]);
        if ($request->hasFile("logo")) {   // so first we check if there is a file uploaded in the input field with the name logo 

            // $formFields["logo "]=$request->file("logo") adds the path obtained from the file input to the logo column in the database  then finally file("logo")->store("logos","public")
            // uploads the file to the folder logos which will get created for us probably in the directory public .  
            $formFields["logo"] = $request->file("logo")->store("logos", "public");
            //quick note : when we store the file path there is an extra step that we need to take
            // in order to be able to access the image file we need to create a link from the storage folder to the public folder 
            // so we just run the artisan command : `php artisan storage:link` 
        }
        $listing->update($formFields); // instead of Listing::create($form fields) because we don't want to create a new record in the database or a new model 
        return back()->with("message", 'Listing updated successfully'); //  if this doesn't redirect us the given route that mean there is a problem
        // with the code about meaning the validate function .
        //  with("message",'Listing created successfully') now when using this flash message we need somewhere in the view to show it
        // we can create a component to show the message
        // now the ` with ` here is called a helper function ,The with function returns the value it is given


    }
    // delete listing 
    public function destroy(Listing $listing){
        $listing ->delete();
        return redirect("/")->with("message","listing deleted successfully");
        
    }
}
