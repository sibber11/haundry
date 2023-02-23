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
    private array $types = [
        'T-Shirt', 'Kombol', 'Lap Cover', 'Sari', 'Three Piece', 'Jumper', 'Coat', 'Shirt',
        'Pant', 'Trouser', 'Panjabi', 'Pajama', 'Rumal', 'Lungi', 'Tupi', 'Cap', 'Cador', 'Sofa Cover',
        'Porda', 'Chair Cover', 'Table Cover', 'Cover', 'Lahenga', 'Groun'
    ];

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            //'category_id' => Category::inRandomOrder()->first() ?? Category::factory(),
            'name' => $this->faker->randomElement($this->types),
            'icon' => 'shirt'
        ];
    }

//    public function configure()
//    {
//        dump($this->service_added);
//        if (!$this->service_added) {
//            return $this->afterCreating(function (LaundryType $laundryType) {
//                $services = Service::inRandomOrder()->limit(random_int(1, 4))->get();
//                $service_array = [];
//                foreach ($services as $service) {
//                    $service_array[$service->id] = ['price' => random_int(10, 100)];
//                }
//                $laundryType->services()->attach($service_array);
//            });
//        } else {
//            return $this;
//        }
//    }

    public function services(array $services_array = [])
    {
        return $this->afterCreating(function (LaundryType $laundryType) use ($services_array) {
            $all_services = Service::all();

            foreach ($services_array as $service => $price) {
                $service_id = $all_services->where('name', $service)->first()->id;
                $service_array[$service_id] = ['price' => $price];
            }
            $laundryType->services()->attach($service_array);
        });
    }

    public function category(Category $category)
    {
        return $this->state(function (array $attributes) use ($category) {
            return [
                'category_id' => $category->id
            ];
        });
    }
}
