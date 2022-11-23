<?php

namespace Tests\Feature;

use App\Models\Feedback;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->post(route('post_feedback', [
            'name' => 'SIbber',
            'email' => 'sibber11@gmail.com',
            'feedback' => 'lorem',
        ]));
        $response->assertRedirect();
        $this->assertDatabaseCount(Feedback::class, 1);

    }
}
