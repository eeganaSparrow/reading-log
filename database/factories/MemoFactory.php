<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Memo>
 */
class MemoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => $this->faker->numberBetween(1,10),
            'page_number' => $this->faker->numberBetween(0,500),
            'content' => $this->faker->realText(80),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
