<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Laundry;
use App\Models\LaundryType;
use App\Models\Order;
use App\Models\Package;
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
        self::assertDatabaseCount(Laundry::class, 1);
    }

    public function test_order_can_be_placed_by_customer()
    {
        $this->withoutExceptionHandling();
        $this->auth_as_customer();
        /**
         * @var Customer $customer
         */
        $customer = Customer::factory()->create();
        $laundry_type = LaundryType::factory()->create();
        $laundry_type1 = LaundryType::factory()->create();
        $response = $this->post(route('order.store'), [
            'customer_id' => $customer->id,
            'deadline_date' => '10/05/2022',
            'deadline_time' => '17:00',
            'items' => [
                [
                    'laundry_type_id' => $laundry_type->id,
                    'service_id' => $laundry_type->services->first()->id,
                    'amount' => 3
                ],
                [
                    'laundry_type_id' => $laundry_type1->id,
                    'service_id' => $laundry_type1->services->first()->id,
                    'amount' => 4
                ],
            ],
        ]);

        $response->assertRedirect();
        self::assertDatabaseCount(Order::class, 1);
        self::assertDatabaseCount(Laundry::class, 2);
    }

    public function test_voucher_can_be_applied_to_order_by_admin()
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
        self::assertDatabaseCount(Order::class, 1);
        self::assertDatabaseCount(Laundry::class, 1);

    }

    public function test_customer_can_use_package_to_order()
    {
        $this->withoutExceptionHandling();
        $this->auth_as_customer();
        /** @var Customer $customer */
        $customer = auth()->user();
        $customer->subscribe(Package::factory()->create());
        $laundry_type = LaundryType::factory()->create();
        $response = $this->post(route('order.store'), [
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
        ]);
        $response->assertRedirect();
        self::assertDatabaseCount(Order::class, 1);
        self::assertDatabaseCount(Laundry::class, 1);

    }

}

