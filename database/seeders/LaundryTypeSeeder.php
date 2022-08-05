<?php

namespace Database\Seeders;

use App\Models\Laundry;
use App\Models\LaundryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaundryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LaundryType::factory(4)->create();
    }
}
