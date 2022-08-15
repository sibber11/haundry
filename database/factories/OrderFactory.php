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
        $customer = Customer::first() ?? Customer::factory();
        return [
            'customer_id' => $customer,
            'total' => 0,
            'deadline' => $this->faker->date('Y-m-d H:i:s'),
        ];
    }
}
