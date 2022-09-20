<?php

namespace Database\Seeders;

use App\Models\LaundryType;
use Illuminate\Database\Seeder;

class LaundryTypeSeeder extends Seeder
{
    private $inputs = [
        'men' => ['shirt'],
        'women' => ['saree'],
        'child' => ['pant'],
        'household' => ['blanket'],
    ];

    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        /*foreach ($this->inputs as $input => $array) {
            foreach ($array as $value) {
                LaundryType::factory()->create([
                    'category_id' => Category::whereName($input)->first(),
                    'name' => $value,
                ]);
            }
        }*/
        LaundryType::factory()->count(20)->create();
    }
}
