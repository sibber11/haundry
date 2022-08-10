<?php

namespace Database\Seeders;

use App\Models\Customer;
use Database\Seeders\LaundryTypesTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            Customer::factory()->create([
                'name' => 'Customer',
                'email' => 'customer@haundry.test',
            ]);
        } catch (\Throwable $th) {
            echo 'customer exists!';
        }

        $this->call([
            LaundryTypesTableSeeder::class,
        ]);
    }
}
