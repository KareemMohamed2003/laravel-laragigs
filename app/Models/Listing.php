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
}
