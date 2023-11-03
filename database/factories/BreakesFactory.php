<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Breakes>
 */
class BreakesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_date' => $this->faker->dateTime,
            'end_date' => $this->faker->dateTime,
            'name' => $this->faker->word,
            'reason' => $this->faker->sentence,
            //
        ];
    }
}