<?php

namespace Database\Factories\Admin;

use App\Models\Admin\LaundryType;
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
            'category' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'name' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'wash_price' => $this->faker->word,
            'dry_wash_price' => $this->faker->word,
            'iron_price' => $this->faker->word
        ];
    }
}
