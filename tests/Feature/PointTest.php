<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Log;
use App\Models\Point;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class PointTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_point_is_created_with_customer()
    {
        Customer::factory()->create();
        $this->assertDatabaseCount(Point::class, 1);
    }

    public function test_point_can_be_added()
    {
        $customer = Customer::factory()->create();
        $customer->add_point(25);
        assertEquals(25, $customer->point->total);
        assertEquals(25, $customer->point->logs->first()->pivot->amount);
        $customer->add_point(35);
        assertEquals(60, $customer->point->total);
        assertEquals(35, $customer->point->load('logs')->logs->find(2)->pivot->amount);
        $this->assertDatabaseCount(Log::class, 2);
    }
}
