<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Address
 *
 * @method static \Database\Factories\AddressFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @mixin \Eloquent
 */
class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'longitude',
        'latitude',
    ];

    protected static function boot()
    {
        parent::boot();
//        static::creating(function (Address $address) {
//            $address->longitude =
//        });
    }

    public array $rules = [
        'area_id' => 'required|numeric',
        'longitude' => 'required|numeric',
        'latitude' => 'required|numeric',
    ];

    protected $attributes = [
//        'location' => 'default location'
    ];

    public function longitude(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return $value / 10000;
            },
            set: function($value){
                return $value * 10000;
            }
        );
    }
    public function latitude(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return $value / 10000;
            },
            set: function($value){
                return $value * 10000;
            }
        );
    }
    public function location(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return [
                    'area' => $attributes['area'],
                    'extra' => $attributes['extra'],
                ];
            },
        );
    }
}
