<?php

namespace Database\Factories;

use App\Models\Admin\Order;
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

        return [
            'customer_id' => $this->faker->word,
            'total' => $this->faker->word,
            'deadline' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
