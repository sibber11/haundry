<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;
    public $table = 'laundries';
    public $timestamps = false;
    public $fillable = [
        'order_id',
        'laundry_type_id',
        'service_id',
        'amount'
    ];

    protected $casts = [
        // 'service_id' => 'numeric',
    ];

    // public static $rules = [
    //     'order_id' => 'required',
    //     'laundry_type_id' => 'required',
    //     'service_id' => 'required|string',
    //     'amount' => 'required|numeric'
    // ];

    public function laundry_type()
    {
        return $this->belongsTo(LaundryType::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getPriceAttribute()
    {
        return $this->laundry_type->services()->find($this->service_id)->pivot->price;
    }

}
