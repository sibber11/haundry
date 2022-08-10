<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    public $table = 'laundries';
    public $timestamps = false;
    public $fillable = [
        'order_id',
        'laundry_type_id',
        'service_type',
        'amount'
    ];

    protected $casts = [
        'service_type' => 'string',
    ];

    public static $rules = [
        'order_id' => 'required',
        'laundry_type_id' => 'required',
        'service_type' => 'required|string',
        'amount' => 'required|numeric'
    ];

    public function laundry_type()
    {
        return $this->belongsTo(LaundryType::class);
    }

}
