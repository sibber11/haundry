<?php

namespace Database\Seeders;

use App\Models\Laundry;
use App\Models\Order;
use Database\Factories\LaundryFactory;
use Database\Factories\OrderFactory;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        //Order::factory(6)->create();
        Order::factory()->count(100)->hasLaundries()->create();
        /*->each(function ($order){

        });*/
    }
}
