<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\LaundryType;
use App\Models\Order;
use App\Models\Package;
use App\Models\Service;
use Tests\TestCase;

class PackageTest extends TestCase
{
    public function test_package_can_be_factorized()
    {
        Package::factory()->create();
        dump(Package::first()->toArray());
        $this->assertDatabaseCount(Package::class, 1);
    }

    public function test_package_can_be_created()
    {
        $this->assertDatabaseCount(Package::class, 0);
        $this->withoutExceptionHandling();
        $this->auth_as_admin();
        $response = $this->post(route('admin.packages.store'), [
            'service_id' => $service = Service::inRandomOrder()->first(),
            'name' => 'Monthly ' . $service->name . ' Pack',
            'total_piece' => 100,
            'regular_price' => 1000,
            'price' => 900,
            'save' => 100,
            'duration' => 3,
        ]);
        $response->assertRedirect();
        $this->assertDatabaseCount(Package::class, 1);
    }

    public function test_customer_can_subscribe_to_package()
    {
        /** @var Customer $customer */
        $customer = Customer::factory()->create();
        /** @var Package $package */
        $package = Package::factory()->create();
//        self::assertEquals(0, $customer->packages()->count());
        $customer->subscribe($package);
        self::assertEquals(1, $customer->packages()->count());
    }

    public function test_package_is_useable_in_orders()
    {
        /** @var Customer $customer */
        $customer = Customer::factory()->create();
        /** @var Package $package */
        $package = Package::factory()->create([
            'service_id' => 1
        ]);
        /** @var LaundryType $laundry_type */
        $laundry_type = LaundryType::factory(1)->createOne();
        $laundry_type->services()->attach(1, ['price' => 25]);
        $customer->subscribe($package);
        /** @var Order $order */
        $order = Order::factory()->create([
            'customer_id' => $customer->id
        ]);
        $order->add_item($laundry_type, $package->service, 2);
        $customer->use_package($order);
        self::assertEquals(0, $order->total);
        self::assertEquals($package->total_piece - 2, $customer->packages->first()->pivot->remaining);
        self::assertEquals($package->id, $order->laundries()->first()->package_id);

    }
}
