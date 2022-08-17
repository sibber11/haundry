<?php

namespace App\Models;


use App\Models\Customer;
use App\Models\Laundry;
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
        'deadline' => 'required|date',
        'items' => 'required|array'
    ];
    protected $attributes = [
        'total' => 0,
    ];

    public function calculate_total()
    {
        $total = 0;
        foreach ($this->laundries as $laundry) {
            $total += $laundry->service->price;
            dump($laundry->service->price);
        }
        dump($total);
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
    /**
     * Get the customer that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
