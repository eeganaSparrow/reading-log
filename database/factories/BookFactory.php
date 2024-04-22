<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (!Storage::exists('public/images')){
            Storage::makeDirectory('public/images');
        }
        return [
            'category_id' => $this->faker->randomElement([1,2,3,4]),
            'title' => $this->faker->realText(15),
            'author' => $this->faker->name,
            'picture_name' => $this->faker->image(storage_path('app/public/images'),
            150, 200, null, false),
            'publisher' => $this->faker->company,
            'publication_year' => $this->faker->numberBetween(1000,3000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
