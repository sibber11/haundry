<?php

namespace Tests\Feature;

use App\Events\CallRequested;
use Tests\TestCase;

class FirebaseNotificationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_notification_can_be_sent()
    {
        \Event::fake();
        //$this->withoutExceptionHandling();
        //post to request call
        $response = $this->post(route('request_call'), [
            'name' => 'John Doe',
            'phone' => '1234567890',
        ]);
        //assert that the event was dispatched
        \Event::assertDispatched(\App\Events\CallRequested::class);
        //assert that the event was dispatched with the correct data
        \Event::assertDispatched(\App\Events\CallRequested::class, function ($event) {
            return $event->call->name === 'John Doe' && $event->call->phone === '1234567890';
        });
        //assert that the listener was called
        \Event::assertListening(CallRequested::class, [\App\Listeners\SendPushNotification::class, 'handleCallRequested']);
    }
}
