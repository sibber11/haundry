<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    public static $rules = [
        'deadline_date' => 'required|date',
        'deadline_time' => 'required|date_format:H:i',
        'pickup_date' => 'required|date',
        'pickup_time' => 'required|date_format:H:i',
        'items' => 'required|array',
        'voucher_code' => 'nullable|string'
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

    public $table = 'orders';

    public $fillable = [
        'customer_id',
        'deadline',
        'pickup'
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'pickup' => 'datetime'
    ];

    protected $attributes = [
        'total' => 0,
        'sub_total' => 0,
        'status' => 'placed',
        'paid' => false,
        'due_date' => null,
    ];

    public function scopeRequiresPickup($query)
    {
        $query->where('status', 'confirmed');
    }

    public function scopePickable($query)
    {
        $query->where('status', 'confirmed');
    }

    public function scopeNew($query)
    {
        $query->where('status', 'placed');
    }

    public function scopeOperable($query)
    {
        $query->where('status', 'onoperation');
    }

    public function scopeDeliverable($query)
    {
        $query->where('status', 'operated');
    }

    public function scopeRunning($query)
    {
        $query->where('status', 'like', 'on%');
    }

    public function scopeCompleted($query)
    {
        $query->whereIn('status', ['delivered', 'completed']);
    }

    public function update_status()
    {
        switch ($this->status) {
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

    public function change_status(string|int $status)
    {
        if (is_integer($status)) {
            $status = $this->status[$status];
        }
        if ($this->status == $status)
            return;
        $this->status = $status;
        $this->save();
    }

    public function rollback_status()
    {
        switch ($this->status) {
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

    public function add_items(array $input): bool
    {
        //todo: add price to the order

        //fetch all laundry types from the database that matches the ids in the input
        $laundry_types = LaundryType::findMany(array_column($input, 'id'));
        $laundries = [];
        $services = Service::all();
        foreach ($input as $laundry) {
            try {
                $laundries[] = Laundry::make([
                    'laundry_type_id' => $laundry_types->find($laundry['id'])->id,
                    'service_id' => $services->find($laundry['service_id'])->id,
                    'amount' => $laundry['amount']
                ]);
            } catch (\Exception $e) {
                dump($e->getMessage());
                return false;
            }
        }
        $this->laundries()->saveMany($laundries);
        $this->calc_sub_total();
        return true;
    }

    public function laundries()
    {
        return $this->hasMany(Laundry::class);
    }

    public function calc_sub_total()
    {
        $sub_total = 0;
        $total = 0;
        $this->load('laundries');
        foreach ($this->laundries as $laundry) {
            $price = $laundry->price * $laundry->amount;
            if (!$laundry->package_id)
                $total += $price;
            $sub_total += $price;
        }
        $this->sub_total = $sub_total;
        $this->total = $total;
        $this->save();
    }

    public function add_item(LaundryType $laundryType, Service|int $service, int $amount): void
    {
        if (is_integer($service)) {
            $service = Service::findOrFail($service);
        }
        $laundry = $this->laundries()->save(Laundry::make([
            'laundry_type_id' => $laundryType->id,
            'service_id' => $service->id,
            'amount' => $amount
        ]));
        $this->save();
    }

    public function apply_voucher(Voucher|string $voucher): bool
    {
        if (is_string($voucher)) {
            $voucher = Voucher::whereCode($voucher)->first();
            if (empty($voucher)) {
                return false;
            }
        }

        if (!$voucher->is_useable_by($this->customer)) {
            return false;
        }

        if ($voucher->minimum != null && $this->sub_total < $voucher->minimum)
            return false;
//        dd("voucher is good");
        $this->applied_voucher()->associate($voucher);
        if ($voucher->is_percent) {
            $actual_discount = min([$this->sub_total - $this->calculate_discount($voucher), $voucher->maximum]);
        } else {
            $actual_discount = $this->sub_total - $this->calculate_discount($voucher);
        }
        $this->total = $actual_discount;
        $this->save();
        $voucher->mark_as_used();
        return true;
    }

    public function applied_voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }

    /**
     * @param Model|object|\Illuminate\Database\Eloquent\Builder|string|Voucher|null $voucher
     * @return void
     */
    public function calculate_discount(Voucher $voucher): int
    {
        if ($voucher->is_percent) {
            $discount = $this->total * ($voucher->discount / 100);
            if (!$voucher->maximum)
                return $discount;
            else
                return min([$discount, $voucher->maximum]);
        } else
            return $voucher->discount;
    }

    public function use_point()
    {
        $user_point = auth()->user()->point;
        if ($user_point->total <= 0)
            return;
        $usable_point = min($user_point->total, $this->total);
        $user_point->total -= $usable_point;
        $this->total -= $usable_point;
        $this->point_used = $usable_point;
        $user_point->save();
        $this->save();
//        dump($usable_point, $user_point->total, $this->total);
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
