<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Order;
use Database\Seeders\OrdersSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    public function test_order_total_calculator()
    {
        $this->withoutExceptionHandling();
        Customer::factory()->create();
        $user = Customer::first();
        $this->actingAs($user);
        $response = $this->post(route('admin.orders.store', [
            'customer_id' => $user->id,
            'deadline' => '10/05/2022',
            'items' => [
                [
                    'laundry_type_id' => 1,
                    'service_id' => 1,
                    'amount' => 3
                ],
            ]

        ]));

        $response->assertRedirect();
        $this->assertDatabaseCount('orders', 1);
    }

    public function test_order_seeder()
    {
        $this->seed(OrdersSeeder::class);
        $this->assertDatabaseCount(Order::class, 6);
    }

}
