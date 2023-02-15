<?php

namespace Database\Factories;

use App\Models\LaundryType;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laundry>
 */
class LaundryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $order = Order::inRandomOrder()->first() ?? Order::factory();
        $laundry_type = LaundryType::inRandomOrder()->first() ?? LaundryType::factory()->services();
        $service = $laundry_type->services()->inRandomOrder()->first();
        $price = $laundry_type->price($service);
        $amount = $this->faker->numberBetween(0, 10);
        return [
            'order_id' => $order,
            'laundry_type_id' => $laundry_type,
            'service_id' => $service,
            'amount' => $amount,
            'price' => $price,
            'subtotal' => $price * $amount
        ];
    }
}
