<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'category_id' => $this->faker->randomElement([1,2,3,4]),
            'tytle' => $this->faker->realText(15),
            'author' => $this->faker->name,
            'publisher' => $this->faker->company,
            'publication_year' => $this->faker->numberBetween(1000,3000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
