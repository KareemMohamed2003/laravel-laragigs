<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Listing extends Model
{
    // when you create a model with a name Listing it automatically assumes that there is a
    // this model corresponds to a table named `Listings`
    use HasFactory;
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
