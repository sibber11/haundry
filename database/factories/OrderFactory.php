<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;


class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var  string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return  array
     */
    public function definition()
    {
        $customer = Customer::inRandomOrder()->first() ?? Customer::factory();

        return [
            'customer_id' => $customer,
            'total' => $this->faker->numberBetween(5, 500),
            'status' => $this->faker->randomElement(Order::$status),
            'deadline' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->dateTimeThisMonth(),
            'updated_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
