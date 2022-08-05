<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use GuzzleHttp\Promise\Create;
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
        User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@haundry.test',
            'password' => '$2y$10$3HKpFT7YLLy6LwAnHebEVOnQvoE/BBV.cw/DZOQ2Eh90cKYF8FMja', //password
            'phone' => '+8801735974411',
        ]);
        
        $this->call([
            LaundryTypeSeeder::class,
        ]);
    }
}
