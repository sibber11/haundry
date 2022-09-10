<?php

namespace App\Traits;

use App\Models\Log;
use App\Models\Voucher;

trait HasVoucherPoint
{
    public function generateVoucher(int $discount = 20): Voucher|string
    {
        $discountMultiplier = 10;
        if ($this->point->total >= $discount * $discountMultiplier) {
            $this->point->total -= $discount * $discountMultiplier;
            $this->point->save();
            return $this->vouchers()->save(Voucher::create(['discount' => $discount]));
        } else {
            return "You Don't Have Enough Point";
        }
    }

    public function add_point(int $amount): void
    {
        $this->point->logs()->save(new Log([
            'content' => 'something'
        ]), ['amount' => $amount]);
        $this->point->total = $this->point->total + $amount;
        $this->point->save();
    }
}
