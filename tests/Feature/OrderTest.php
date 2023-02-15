<?php

namespace Tests\Feature;

use App\Events\OrderPlaced;
use App\Models\Customer;
use App\Models\Laundry;
use App\Models\LaundryType;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use function PHPUnit\Framework\assertArrayHasKey;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_can_be_placed_by_admin()
    {
        $this->withoutExceptionHandling();
        $this->auth_as_admin();
        $customer = Customer::factory()->create();
        $laundry_type = LaundryType::factory()->services()->create();
        $response = $this->post(route('admin.orders.store', [
            'customer_id' => $customer->id,
            'deadline_date' => '10/05/2022',
            'deadline_time' => '17:00',
            'pickup_date' => '09/05/2022',
            'pickup_time' => '17:00',
            'items' => [
                [
                    'id' => $laundry_type->id,
                    'service_id' => $laundry_type->services->first()->id,
                    'amount' => 3
                ]
            ]
        ]));

        $response->assertRedirect();
        $this->assertDatabaseCount(Order::class, 1);
        $this->assertDatabaseCount(Laundry::class, 1);
    }

    public function test_order_can_be_placed_by_customer()
    {
        \Event::fake();
        $this->withoutExceptionHandling();
        $this->auth_as_customer();
        /**
         * @var Customer $customer
         */
//        $customer = Customer::factory()->create();
        $laundry_type = LaundryType::factory()->services()->create();
        $laundry_type1 = LaundryType::factory()->services()->create();
        $response = $this->post(route('save_cart'), [
            'cart' => [
                [
                    "id" => $laundry_type->id,
                    "name" => $laundry_type->name,
                    "amount" => 2,
                    "service_id" => $laundry_type->services->first()->id,
                    "price" => $laundry_type->services->first()->price,
                ],
                [
                    "id" => $laundry_type1->id,
                    "name" => $laundry_type1->name,
                    "amount" => 2,
                    "service_id" => $laundry_type1->services->first()->id,
                    "price" => $laundry_type1->services->first()->price,
                ]
            ]
        ]);

        $response->assertSessionHas('cart');

        $response = $this->post(route('orders.store'));

        $response->assertRedirect();
        $this->assertDatabaseCount(Order::class, 1);
        $this->assertDatabaseCount(Laundry::class, 2);
        \Event::assertDispatched(OrderPlaced::class);
    }

    public function test_voucher_can_be_applied_to_order_by_admin()
    {
        $this->auth_as_admin();
        /**
         * @var Customer $customer
         */
        $customer = Customer::factory()->create();
        $voucher = $customer->generateVoucher(20, 100, 0, false, true);
        $laundry_type = LaundryType::factory()->services()->create();
        $response = $this->post(route('admin.orders.store'), [
            'customer_id' => $customer->id,
            'deadline_date' => '10/05/2022',
            'deadline_time' => '17:00',
            'pickup_date' => '09/05/2022',
            'pickup_time' => '17:00',
            'items' => [
                [
                    'id' => $laundry_type->id,
                    'service_id' => $laundry_type->services->first()->id,
                    'amount' => 3
                ],
            ],
            'voucher_code' => $voucher->code
        ]);
        $response->assertRedirect();
        $this->assertDatabaseCount(Order::class, 1);
        $this->assertDatabaseCount(Laundry::class, 1);
    }

    //todo: fix this test
    public function customer_can_use_package_to_order()
    {
        $this->withoutExceptionHandling();
        $this->auth_as_customer();
        /** @var Customer $customer */
        $customer = auth()->user();
        $customer->purchase($package = Package::factory()->create(['points' => 10]));
        $laundry_type = LaundryType::factory()->services()->create();
        $response = $this->post(route('save_cart'), [
            'cart' => [
                [
                    'id' => $laundry_type->id,
                    'service_id' => $laundry_type->services->first()->id,
                    'amount' => 3
                ],
            ],
            'use_point' => true,
        ]);
        $response->assertSessionHas('cart');

        $response = $this->post(route('orders.store'));
//        dump(auth()->user()->point->total, Order::first()->total, Order::first()->sub_total);
        $response->assertRedirect();
        $this->assertDatabaseCount(Order::class, 1);
        $this->assertDatabaseCount(Laundry::class, 1);
    }

    public function test_price_and_subtotal_added()
    {
        Event::fake();
        $this->withoutExceptionHandling();
        $this->auth_as_customer();
        /** @var Customer $customer */
        $customer = auth()->user();
        $laundry_type = LaundryType::factory()->services()->create();
        $response = $this->post(route('save_cart'), [
            'cart' => [
                [
                    'id' => $laundry_type->id,
                    'service_id' => $laundry_type->services->first()->id,
                    'amount' => 3
                ],
            ],
        ]);

        $response = $this->post(route('orders.store'));
        $this->assertDatabaseCount(Laundry::class, 1);
        $laundry = Laundry::first();
        assertArrayHasKey('price', $laundry->toArray());
        assertArrayHasKey('subtotal', $laundry->toArray());
    }
}

