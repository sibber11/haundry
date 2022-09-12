<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\LaundryType;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_can_be_placed_by_admin()
    {
        $this->withoutExceptionHandling();
        $this->auth_as_admin();
        $customer = Customer::factory()->create();
        $laundry_type = LaundryType::factory()->create();
        $response = $this->post(route('admin.orders.store', [
            'customer_id' => $customer->id,
            'deadline_date' => '10/05/2022',
            'deadline_time' => '17:00',
            'items' => [
                [
                    'laundry_type_id' => $laundry_type->id,
                    'service_id' => $laundry_type->services->first()->id,
                    'amount' => 3
                ],
            ]
        ]));

        $response->assertRedirect();
        $this->assertDatabaseCount(Order::class, 1);
    }

    public function test_order_can_be_placed_by_customer()
    {
        //todo: test for customer
    }

    public function test_voucher_can_be_applied_to_order()
    {
        $this->auth_as_admin();
        /**
         * @var Customer $customer
         */
        $customer = Customer::factory()->create();
        $voucher = $customer->generateVoucher(20, true);
        $laundry_type = LaundryType::factory()->create();
        $response = $this->post(route('admin.orders.store'), [
            'customer_id' => $customer->id,
            'deadline_date' => '10/05/2022',
            'deadline_time' => '17:00',
            'items' => [
                [
                    'laundry_type_id' => $laundry_type->id,
                    'service_id' => $laundry_type->services->first()->id,
                    'amount' => 3
                ],
            ],
            'voucher_code' => $voucher->code
        ]);

        $response->assertRedirect();
    }

}
