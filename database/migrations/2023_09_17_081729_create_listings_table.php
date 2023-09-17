<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // you first have to create the migration via the `php artisan make migration : migration_name`
        // now rememeber that u need to run the migrate command to run the migration
        // and create the table with the columns below id, title , tags ,
        // company,location,email, website , description .
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("tags");
            $table->string("company");
            $table->string("location");
            $table->string("email");
            $table->string("website");
            $table->longText("description");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
};

