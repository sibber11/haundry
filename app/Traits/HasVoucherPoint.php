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

    public function generateVoucher(int $discount, int $minimum, int $maximum = 0, bool $is_percent = false, bool $force_create = false): Voucher|string
    {
        $attributes = [
            'discount' => $discount,
            'minimum' => $minimum,
            'maximum' => $maximum,
            'is_percent' => $is_percent
        ];
        if ($force_create) {

            return $this->vouchers()->save(Voucher::create($attributes));
        }

        $discountMultiplier = 10;
        if ($this->point->total >= $discount * $discountMultiplier) {
            $this->point->total -= $discount * $discountMultiplier;
            $this->point->save();
            return $this->vouchers()->save(Voucher::create($attributes));
        } else {
            return "You Don't Have Enough Point";
        }
    }

    public function add_point(int $amount)
    {
        $this->point->logs()->save(new Log([
            'content' => 'something'
        ]), ['amount' => $amount]);
        $this->point->total = $this->point->total + $amount;
        $this->point->save();
        return $amount . ' point ' . 'added to the account of ' . $this->name;
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
