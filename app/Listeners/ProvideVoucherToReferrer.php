<?php

namespace App\Listeners;

use App\Models\Customer;
use Illuminate\Auth\Events\Registered;

class ProvideVoucherToReferrer
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(Registered $event)
    {
        /** @var Customer $user */
        $user = $event->user->referrer;
//        dd($user);
        if ($user->refered()->count() > 0)
            return;
        $user->generateVoucher(20, true);
    }
}
