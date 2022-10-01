<?php

namespace App\Traits;

use App\Models\Log;
use App\Models\Point;
use App\Models\Voucher;

trait HasVoucherPoint
{

    public function instantiateHasVoucherPoint()
    {

    }

    public static function booted()
    {
        parent::booted();
        static::created(function ($customer) {
            $customer->point()->save(new Point());
        });
    }

    public function generateVoucher(int $discount = 20, bool $force_create = false): Voucher|string
    {

        if ($force_create) {
            return $this->vouchers()->save(Voucher::create(['discount' => $discount]));
        }

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

    public function point()
    {
        return $this->hasOne(Point::class);
    }

    public function vouchers()
    {
        return $this->hasMany(Voucher::class)->whereIsUsed(false);
    }

    public function getCanClaimVoucherAttribute()
    {
        return $this->point->total >= 200;
    }
}
