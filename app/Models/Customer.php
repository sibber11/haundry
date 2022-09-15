<?php

namespace App\Models;

use App\Traits\CanSubscribeToPackage;
use App\Traits\HasReferral;
use App\Traits\HasVoucherPoint;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
//implements MustVerifyEmail, MustVerifyPhone
{
//    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, MustVerifyPhoneTrait, HasTwoFactorGuard, HasReferral;
    use HasFactory, SoftDeletes, HasReferral, HasVoucherPoint, CanSubscribeToPackage;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
        'two_factor_expires_at',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
