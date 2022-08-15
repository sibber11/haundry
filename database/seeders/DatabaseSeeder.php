<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Database\Seeders\LaundryTypeSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            LaundryTypeSeeder::class,
        ]);
    }
}
