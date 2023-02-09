<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Package;
use Tests\TestCase;

class PackageTest extends TestCase
{
    public function test_package_can_be_factorized()
    {
        Package::factory()->create();
//        dump(Package::first()->toArray());
        $this->assertDatabaseCount(Package::class, 1);
    }

    public function test_package_can_be_created()
    {
        $this->assertDatabaseCount(Package::class, 0);
        $this->withoutExceptionHandling();
        $this->auth_as_admin();
        $response = $this->post(route('admin.packages.store'), [
            'name' => 'Min',
            'points' => 1000,
            'price' => 900
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
        $customer->purchase($package);
        self::assertEquals(1, $customer->packages()->count());
    }
}
