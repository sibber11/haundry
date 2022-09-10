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
        Voucher::create();
        $this->assertDatabaseCount(Voucher::class, 1);
    }

    public function test_customer_can_recieve_voucher()
    {
        $customer = Customer::factory()->create();
        $customer->add_point(200);
        $customer->generateVoucher();
        $this->assertDatabaseCount(Voucher::class, 1);
        $this->assertEquals(20, $customer->vouchers->first()->discount);
    }
}
