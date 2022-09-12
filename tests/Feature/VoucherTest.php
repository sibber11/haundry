<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Voucher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VoucherTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_voucher_can_be_created()
    {
        $voucher = Voucher::create();
        $this->assertDatabaseCount(Voucher::class, 1);
        self::assertFalse($voucher->is_used);
    }

    public function test_customer_can_recieve_voucher()
    {
        $customer = Customer::factory()->create();
        $customer->add_point(200);
        $customer->generateVoucher();
        $this->assertDatabaseCount(Voucher::class, 1);
        $this->assertEquals(20, $customer->vouchers->first()->discount);
    }

    public function test_voucher_is_useable_by_customer()
    {
        /**
         * @var Customer $customer
         */
        $customer = Customer::factory()->create();
        /**
         * @var Voucher $voucher
         */
        $voucher = $customer->generateVoucher(10, true);
        self::assertTrue($voucher->is_useable_by($customer));
        $customer2 = Customer::factory()->create();
        self::assertFalse($voucher->is_useable_by($customer2));
        $voucher->mark_as_used();
        self::assertFalse($voucher->is_useable_by($customer));
    }
}
