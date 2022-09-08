<?php

namespace Tests\Feature\Mail;

use App\Mail\InvitationMail;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SendInvitationMailTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_send_invitation()
    {
        \Mail::fake();
        $this->withExceptionHandling();
        $customer = Customer::factory()->create();
        $this->actingAs($customer);

        $response = $this->post(route('send_invitation'), [
            'mail' => 'abd@ui.co'
        ]);
        \Mail::assertSent(InvitationMail::class);

//        dump($response);
    }
}
