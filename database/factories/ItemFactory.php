<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'company_id' => $this->faker->numberBetween( $int1 = 1,  $int2 = 25),
            'order_week' => $this->faker->randomElement(['月','火','水','木','金','土','日']),
        ];
    }
}
