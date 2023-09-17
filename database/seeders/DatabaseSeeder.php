<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Psy\Readline\Libedit;
use Illuminate\Database\Seeder;
use App\Models\Listing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        // when i attempted to run the command `php artisan migrate to
        // insert the data below into the Listing table  i got this error
        // Illuminate\Database\QueryException

        // SQLSTATE[42S22]: Column not found: 1054 Unknown column 'updated_at' in 'field list' (SQL: insert into `listings`
        // (`title`, `tags`, `company`, `location`, `email`, `website`, `description`, `updated_at`, `created_at`) values
        //(Laravel Senior Developer, laravel, javascript, Acme Corp, Boston, MA, email1@email.com, https://www.acme.com, Lorem ipsum dolor sit amet consectetur adipisicing elit.
        // Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab
        // consectetur tenetur delensiti?, 2023-09-17 11:24:52, 2023-09-17 11:24:52))
        // now this error is because the By default, Eloquent expects created_at and updated_at columns to exist on your
        //  tables. If you do not wish to have these columns automatically
        // managed by Eloquent, set the $timestamps property on your model to false
        //remember to ask Mr . mohamed saeed what is difference between the create and other methods to
        // insert data into the tables
        // insert data into the table via the create method :-
        // Listing::create([

        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);

        // Listing::create([
        //     'title' => 'Laravel Developer',
        //     'tags' => 'laravel, vue, javascript',
        //     'company' => 'Wayne Enterprises',
        //     'location' => 'Gotham, NY',
        //     'email' => 'email3@email.com',
        //     'website' => 'https://www.wayneenterprises.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);
        // Listing::create([
        //     'title' => 'Backend Developer',
        //     'tags' => 'laravel, php, api',
        //     'company' => 'Skynet Systems',
        //     'location' => 'Newark, NJ',
        //     'email' => 'email4@email.com',
        //     'website' => 'https://www.skynet.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);
        // [
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend ,api',
        //     'company' => 'Stark Industries',
        //     'location' => 'New York, NY',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www.starkindustries.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        //   ],
        //   [
        //     'title' => 'Laravel Developer',
        //     'tags' => 'laravel, vue, javascript',
        //     'company' => 'Wayne Enterprises',
        //     'location' => 'Gotham, NY',
        //     'email' => 'email3@email.com',
        //     'website' => 'https://www.wayneenterprises.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        //   ],
        //   [
        //     'title' => 'Backend Developer',
        //     'tags' => 'laravel, php, api',
        //     'company' => 'Skynet Systems',
        //     'location' => 'Newark, NJ',
        //     'email' => 'email4@email.com',
        //     'website' => 'https://www.skynet.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        //   ],
        //   [
        //     'title' => 'Junior Developer',
        //     'tags' => 'laravel, php, javascript',
        //     'company' => 'Wonka Industries',
        //     'location' => 'Boston, MA',
        //     'email' => 'email4@email.com',
        //     'website' => 'https://www.wonka.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        //   ]
        // if you run the command ` php artisan db:seed `
        // with this line in the DatabaseSeeder.php
        // \App\Models\User::factory(10)->create();

        // insert default column data via a factory
        Listing::factory(6)->create(); // this the factory i created via the <command>
        //php artisan make:factory ListingFactory . check the factories folder
    }
}
