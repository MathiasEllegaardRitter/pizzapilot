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
            'startTime' => $this->faker->dateTime,
            'endTime' => $this->faker->dateTime,
            'name' => $this->faker->word,
            'reason' => $this->faker->sentence,
            //
        ];
    }
}
