<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Customer;
use App\Models\LaundryType;

class LaundryTypeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_laundry_can_be_created()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(Customer::factory()->create());

        $this->post(route('admin.laundryTypes.store', [
            'category_id' => 1,
            'name' => "Borka",
            'services' => [
                1 => ['price'=>43]
            ]
        ]));
        $this->assertDatabaseCount(LaundryType::class, 1);
    }
}
