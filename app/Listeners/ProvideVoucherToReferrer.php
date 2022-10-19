<?php

namespace App\Listeners;

use App\Models\Customer;
use Illuminate\Auth\Events\Registered;

class ProvideVoucherToReferrer
{
    private int $discount = 20;
    private bool $is_percent = true;

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
        if ($user == null)
            return;
        if ($user->refered()->count() == 1) {
            $user->generateVoucher($this->discount, 100, 0, false, $this->is_percent);
        }
    }
}
