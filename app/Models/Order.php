<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    public $table = 'orders';

    public $fillable = [
        'customer_id',
        'total',
        'deadline'
    ];

    protected $casts = [
        'deadline' => 'datetime'
    ];

    public static $rules = [
        'deadline_date' => 'required|date',
        'deadline_time' => 'required|date_format:H:i',
        'items' => 'required|array'
    ];
    protected $attributes = [
        'total' => 0,
        'status' => 'placed',
    ];

    static array $status = [
        'placed',
        'confirmed',
        'onpickup',
        'picked',
        'onoperation',
        'operated',
        'ondelivery',
        'delivered',
    ];

    public function scopeRequiresPickup($query)
    {
        $query->orWhere('status', 'confirmed');
    }

    public function scopeOnPickup($query)
    {
        $query->orWhere('status', 'onpickup');
    }
    public function scopeOnDelivery($query)
    {
        $query->orWhere('status', 'ondelivery');
    }

    public function change_status($status)
    {
        if (is_integer($status)) {
            $status = $this->status[$status];
        }
        $this->status = $status;
        $this->save();
    }

    public function calculate_total()
    {
        $total = 0;
        foreach ($this->laundries as $laundry) {
            $total += $laundry->price * $laundry->amount;
        }
        $this->total = $total;
        $this->save();
    }

    public function add_items(array $input): void
    {
        foreach ($input as $laundry) {
            $laundries[] = Laundry::make($laundry);
        }
        $this->laundries()->saveMany($laundries);
        $this->calculate_total();
    }

    public function laundries()
    {
        return $this->hasMany(Laundry::class);
    }
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }
}

