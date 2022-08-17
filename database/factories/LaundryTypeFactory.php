<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\LaundryType;
use Illuminate\Database\Eloquent\Factories\Factory;


class LaundryTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var  string
     */
    protected $model = LaundryType::class;

    /**
     * Define the model's default state.
     *
     * @return  array
     */
    public function definition()
    {

        return [
            'category_id' => Category::inRandomOrder()->first() ?? Category::factory(),
            'name' => $this->faker->name,
            // 'wash_price' => $this->faker->numberBetween(10,200),
            // 'dry_wash_price' => $this->faker->numberBetween(10,200),
            // 'iron_price' => $this->faker->numberBetween(10,200)
        ];
    }
}
