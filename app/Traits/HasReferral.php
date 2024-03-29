<?php

namespace App\Traits;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

trait HasReferral
{
    public static function scopeReferralExists(Builder $query, $referral)
    {
        return $query->whereAffiliateId($referral)->exists();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($referredBy = Cookie::get('referral')) {
                $model->referred_by = $referredBy;
            }

            $model->affiliate_id = self::generateReferral();
        });
    }

    public function referrer()
    {
        return $this->belongsTo(Customer::class, 'referred_by', 'affiliate_id');
    }

    public function refered()
    {
        return $this->hasMany(Customer::class, 'referred_by', 'affiliate_id');
    }

    public function getReferralLink(): string
    {
        if (!$this->affiliate_id) {
            $this->affiliate_id = self::generateReferral();
            $this->save();
        }
        return route('register', ['ref' => $this->affiliate_id]);
    }

    protected static function generateReferral(): string
    {
        $length = config('referral.referral_length', 5);

        do {
            $referral = Str::random($length);
        } while (static::referralExists($referral));

        return $referral;
    }
}
