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
        $query->where('status', 'confirmed');
    }

    public function scopePickable($query)
    {
        $query->where('status', 'confirmed');
    }
    public function scopeOperable($query)
    {
        $query->where('status', 'picked');
    }
    public function scopeDeliverable($query)
    {
        $query->where('status', 'operated');
    }
    public function scopeRunning($query)
    {
        $query->where('status', 'like', 'on%');
    }
    public function change_status($status)
    {
        if (is_integer($status)) {
            $status = $this->status[$status];
        }
        $this->status = $status;
        $this->save();
    }

    public function update_status()
    {
        switch ($this->status)
        {
            case 'placed':
                break;
            case 'confirmed':
                $this->change_status('onpickup');
                break;
            case 'onpickup':
                $this->change_status('picked');
                break;
            case 'picked':
                $this->change_status('onoperation');
                break;
            case 'onoperation':
                $this->change_status('operated');
                break;
            case 'operated':
                $this->change_status('ondelivery');
                break;
            case 'ondelivery':
                $this->change_status('delivered');
                break;
            case 'delevered':
                $this->change_status('completed');
                break;
        }
    }

    public function rollback_status()
    {
        switch ($this->status)
        {
            case 'onpickup':
                $this->change_status('confirmed');
                break;
            case 'onoperation':
                $this->change_status('picked');
                break;
            case 'ondelivery':
                $this->change_status('operated');
                break;
        }
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

    public function missions()
    {
        return $this->belongsToMany(Mission::class);
    }
}

