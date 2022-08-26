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
     *
     * @return  array
     */
    public function definition()
    {
        return [
            'category_id' => Category::inRandomOrder()->first() ?? Category::factory(),
            'name' => $this->faker->name,
        ];
    }

    public function configure()
    {
        $services = Service::inRandomOrder()->limit(random_int(1,4))->get();
        $service_array = [];
        foreach ($services as $service)
        {
            $service_array[$service->id] = ['price' => random_int(10,100)];
        }
        return $this->afterCreating(function (LaundryType $laundryType) use ($service_array) {
            $laundryType->services()->attach($service_array);
        });
    }
}
