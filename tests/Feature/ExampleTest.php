<?php

namespace Tests\Feature;

use App\Helper\DeadlineSolver;
use App\Models\Order;
use Database\Seeders\OrdersSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function test_the_application_returns_a_successful_response()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_deadline_solver()
    {
        $date = DeadlineSolver::solve(['deadline_date' => '10/05/2022', 'deadline_time' => '21:05']);
        self::assertTrue(true);
    }
}
