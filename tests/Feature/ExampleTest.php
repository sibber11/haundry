<?php

namespace Tests\Feature;

use App\Helper\DateSolver;
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
        $date = DateSolver::solve(['deadline_date' => '10/05/2022', 'deadline_time' => '21:05'], 'deadline');
//        dump($date->toDate());
        self::assertTrue(true);
    }
}
