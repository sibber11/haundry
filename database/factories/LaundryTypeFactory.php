<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\LaundryType;
use App\Models\Service;
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
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first() ?? Category::factory(),
            'name' => $this->faker->name,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (LaundryType $laundryType) {
            $services = Service::inRandomOrder()->limit(random_int(1, 4))->get();
            $service_array = [];
            foreach ($services as $service) {
                $service_array[$service->id] = ['price' => random_int(10, 100)];
            }
            $laundryType->services()->attach($service_array);
        });
    }
}
