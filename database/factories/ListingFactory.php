<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // so these act like your default columns when you create the
        // the table apparently
        return [
            //
            // 'tags'=>$this->faker->company(),
            'title'=>$this->faker->sentence(),
            'tags'=>'api,laravel',
            'email'=>$this->faker->companyEmail(),
            'website'=>$this->faker->url(),
            'company'=>$this->faker->company(),
            'location'=>$this->faker->city(),
            'description'=>$this->faker->paragraph(5),

        ];
    }
}
