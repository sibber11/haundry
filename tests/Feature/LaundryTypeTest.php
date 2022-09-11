<?php

namespace Tests\Feature;

use App\Models\LaundryType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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
//        $this->withoutExceptionHandling();
        $this->auth_as_admin();
        $this->post(route('admin.laundryTypes.store', [
            'category_id' => 1,
            'name' => "Borka",
            'services' => [
                1 => ['price' => 43]
            ]
        ]));
        $this->assertDatabaseCount(LaundryType::class, 1);
    }

    public function test_laundry_types_has_services()
    {
        $laundry = LaundryType::factory()->create();
        $this->assertGreaterThan(0, $laundry->services()->count());
    }
}
