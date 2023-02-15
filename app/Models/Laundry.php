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
        'amount',
        'price',
        'subtotal'
    ];

    protected $casts = [
    ];

    public function laundry_type()
    {
        return $this->belongsTo(LaundryType::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
