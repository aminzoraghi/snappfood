<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = $this->faker->date();
        $end_date = $this->faker->date();

        $max_iterations = 100;

        for ($i = 0; $i < $max_iterations; $i++) {
            $end_date = $this->faker->date();

            if ($end_date > $start_date) {
                break;
            }
        }

        if ($i == $max_iterations) {
            throw new Exception('Could not generate a valid start and end date for discount.');
        }

        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'amount' => $this->faker->numberBetween(1, 100),
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];

    }
}
