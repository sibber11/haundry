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
        'customer_id' => 'required',
        'deadline_date' => 'required|date',
        'deadline_time' => 'required|date_format:H:i',
        'items' => 'required|array'
    ];
    protected $attributes = [
        'total' => 0,
        'status' => 'placed',
    ];

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

