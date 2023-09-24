<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Listing extends Model
{
    // when you create a model with a name Listing it automatically assumes that there is a
    // this model corresponds to a table named `Listings`
    use HasFactory;
    protected $fillable = ['title', 'company', 'location', 'email', 'website', 'description', 'tags',"logo"];
    // the string in the $fillable array are the field names in our form that we've created in the create.blade.php file
    // we are telling laravel that  the user can submit the data in these fields all at once 
    //  if we don't set this array with the field names we get a mass assigmnent error . 
    // we can also call the unguard method in the AppServiceProivder.php
    //  in the boot function  like so :"   public function boot() // {  Model:unguard(); }
    // remember to search for mass assignment
    public $timestamps = false;
    public function scopeFilter($query, array $filters)
    {
        // THIS SCOPEFILTER FUNCTION GETS CALLED WHEN WE USE THE MODEL LISTING
        // dd(request('tag'));
        //
        // dd($filters);
        // print_r($query);
        // print_r($filters);
        if ($filters['tag'] ?? false) {

            $query->where('tags', 'like', '%' . request('tag') . '%');
            // echo "scope function called";
            // here we are doing a like query we telling    Mysql  query the
            // tags column and look whatever tag that equals the tag key value returned from the request

        }
        if ($filters['search'] ?? false) { // if the search key  is not null  excute the following code

            $query->where('title', 'like', '%' . request('search') . '%')->orWhere('description', 'like', '%' . request('search') . '%')->orWhere('tags', 'like', '%' . request('search') . '%');
            // echo "scope function called";
            // here we are doing a like query we telling    Mysql  query the
            // tags column and look whatever tag that equals the tag key value returned from the request

        }
    }
}
