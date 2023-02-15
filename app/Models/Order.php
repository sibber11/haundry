<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function updateStatus()
    {
        switch ($this->status) {
            case 'placed':
                break;
            case 'confirmed':
                $this->changeStatus('onpickup');
                break;
            case 'onpickup':
                $this->changeStatus('picked');
                break;
            case 'picked':
                $this->changeStatus('onoperation');
                break;
            case 'onoperation':
                $this->changeStatus('operated');
                break;
            case 'operated':
                $this->changeStatus('ondelivery');
                break;
            case 'ondelivery':
                $this->changeStatus('delivered');
                break;
            case 'delevered':
                $this->changeStatus('completed');
                break;
        }
    }

    public function changeStatus(string|int $status)
    {
        if (is_integer($status)) {
            $status = $this->status[$status];
        }
        if ($this->status == $status)
            return;
        $this->status = $status;
        $this->save();
    }

    public function rollbackStatus()
    {
        switch ($this->status) {
            case 'onpickup':
                $this->changeStatus('confirmed');
                break;
            case 'onoperation':
                $this->changeStatus('picked');
                break;
            case 'ondelivery':
                $this->changeStatus('operated');
                break;
        }
    }

    public function addItems(array $input): bool
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
                //dump($e->getMessage());
                return false;
            }
        }
        $this->laundries()->saveMany($laundries);
        $this->calcSubTotal();
        return true;
    }

    public function laundries(): HasMany
    {
        return $this->hasMany(Laundry::class);
    }

    public function calcSubTotal()
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

    public function addItem(LaundryType $laundryType, Service|int $service, int $amount): void
    {
        if (is_integer($service)) {
            $service = Service::findOrFail($service);
        }
        $this->laundries()->save(Laundry::make([
            'laundry_type_id' => $laundryType->id,
            'service_id' => $service->id,
            'amount' => $amount,
            'price' => $laundryType->price($service),
            'sub_total' => $amount * $laundryType->price($service)
        ]));
        $this->save();
    }

    public function applyVoucher(Voucher|string $voucher): bool
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
        $this->appliedVoucher()->associate($voucher);
        if ($voucher->is_percent) {
            $actual_discount = min([$this->sub_total - $this->calcDiscount($voucher), $voucher->maximum]);
        } else {
            $actual_discount = $this->sub_total - $this->calcDiscount($voucher);
        }
        $this->total = $actual_discount;
        $this->save();
        $voucher->mark_as_used();
        return true;
    }

    public function appliedVoucher(): BelongsTo
    {
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }

    public function calcDiscount(Voucher $voucher): int
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

    public function usePoint()
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

    public function missions(): BelongsToMany
    {
        return $this->belongsToMany(Mission::class);
    }
}
