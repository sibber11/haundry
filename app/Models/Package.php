<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public static $rules = [
        'service_id' => 'required',
        'name' => 'required|string',
        'total_piece' => 'required|numeric',
        'regular_price' => 'required',
        'price' => 'required',
        'save' => 'required',
        'duration' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
    public $table = 'packages';
    public $fillable = [
        'service_id',
        'name',
        'total_piece',
        'regular_price',
        'price',
        'save',
        'duration'
    ];
    protected $casts = [
        'name' => 'string',
    ];

    public function getSubscriber(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->customers()->count()
        );
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function scopeValid(Builder $query)
    {
        return $query->where('end_date', '>', now())->where('remaining', '>', 0);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function laundries()
    {
        return $this->hasMany(Laundry::class);
    }

    //    todo: taka diye point kinbe, service use korle point khoroch hobe. point er dam takar tulonay kom hobe.
}
