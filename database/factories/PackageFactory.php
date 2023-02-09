<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;


class PackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $point = $this->faker->numberBetween(0, 2000);
        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'points' => $point,
            'price' => floor($point * 0.9),
            'active' => true,
        ];
    }
}
