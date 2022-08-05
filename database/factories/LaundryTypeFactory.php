<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LaundryType>
 */
class LaundryTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique->randomElement(['shirt', 't-shirt', 'pant', 'panjabi']),
            'price' => $this->faker->randomNumber(3)
        ];
    }
}
