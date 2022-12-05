<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
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
                'email' => 'customer@washersinn.com',
            ]);
            User::factory()->create([
                'name' => 'Super Admin',
                'email' => 'super_admin@washersinn.com',
                'is_super' => true,
            ]);
        } catch (\Throwable $th) {
            echo 'customer exists!';
        }

        $this->call([
            CustomersSeeder::class,
            LaundryTypeSeeder::class,
            OrdersSeeder::class,
            FeedbackSeeder::class
        ]);
    }
}
