<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Xenon\LaravelBDSms\Facades\SMS;

class SMSChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSms($notifiable);

        $response = SMS::shoot($notifiable->phone, $message);
        session(['ola' => $response]);
        // Send notification to the $notifiable instance...
    }
}
