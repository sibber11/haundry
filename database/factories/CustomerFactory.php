<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;


class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var  string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return  array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name,
            'email' => preg_replace('/@example\..*/', '@haundry.test', $this->faker->unique()->safeEmail),
            'phone' => $this->faker->numerify('+8801#########'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
        ];
    }
}
