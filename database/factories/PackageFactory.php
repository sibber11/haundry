<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\Service;
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
        $total = $this->faker->numberBetween(5, 20) * 5;
        $regular_price = $total * 10;
        $price = (integer)$regular_price * 0.9;
        $save = $regular_price - $price;
        return [
            'service_id' => Service::inRandomOrder()->first(),
            'name' => $this->faker->text($this->faker->numberBetween(25, 40)),
            'total_piece' => $total,
            'regular_price' => $regular_price,
            'price' => $price,
            'save' => $save,
            'duration' => $this->faker->numberBetween(3, 10) * 5,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
