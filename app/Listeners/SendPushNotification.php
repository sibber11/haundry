<?php

namespace App\Listeners;

use App\Events\CallRequested;
use App\Events\OrderPlaced;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Kutia\Larafirebase\Facades\Larafirebase;

class SendPushNotification implements ShouldQueue
{
    use InteractsWithQueue;

    private $fcmTokens;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        try {
            $this->fcmTokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
        } catch (\Exception $e) {

        }
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handleOrderPlaced(OrderPlaced $event)
    {
        $name = ucfirst($event->order->customer->name);
        $total = $event->order->total;
        $msg = "Name: $name, Total: $total";
        Larafirebase::withTitle('New Order Placed')
            ->withBody($msg)
            ->sendMessage($this->fcmTokens);
    }

    public function handleCallRequested(CallRequested $event)
    {
        $name = ucfirst($event->call->name);
        $phone = $event->call->phone;
        $msg = "Name: $name, Phone: $phone";
        Larafirebase::withTitle('New Request Call')
            ->withBody($msg)
            ->sendMessage($this->fcmTokens);
    }

    public function subscribe($events)
    {
        return [
            OrderPlaced::class => 'handleOrderPlaced',
            CallRequested::class => 'handleCallRequested'
        ];
    }
}
