<?php

namespace Database\Seeders;

use App\Models\Order;
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
        Order::factory()->count(1)->hasLaundries()->create();
        /*->each(function ($order){

        });*/
    }
}
