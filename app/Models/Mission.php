<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    public $table = 'missions';

    public $fillable = [
        'user_id',
        'status'
    ];

    protected $casts = [
        'status' => 'string'
    ];

    public static $rules = [
        'user_id' => 'required|numeric|exists:users,id',
//        'status' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    protected $attributes = [
        'status' => 'pending'
    ];

    protected static function booted()
    {
        static::deleting(function ($mission) {
            $mission->orders->each(fn($order) => $order->rollback_status());
            $mission->orders()->detach();
        });
    }

    public function getRunningAttribute()
    {
        return $this->status == 'running';
    }

    public function scopeRunning($query)
    {
        $query->whereStatus('running');
    }

    public function scopePending($query)
    {
        $query->whereStatus('pending');
    }

    public function scopeCompleted($query)
    {
        $query->whereStatus('completed');
    }

    public function scopeInComplete($query)
    {
        $query->whereNot('status', 'completed');
    }

    public function start()
    {
        $this->update([
            'status' => 'running'
        ]);
    }

    public function complete()
    {
        /** @var Order $order */
        $this->orders->each(fn($order) => $order->update_status());
        $this->update([
            'status' => 'completed'
        ]);
    }

    public function assign_orders(array|Collection $orders)
    {
        $order_collection = is_array($orders) ? Order::findMany($orders) : $orders;
        $this->orders()->attach($order_collection);
        /** @var Order $order */
        $order_collection->each(fn($order) => $order->update_status());
    }

    /*
     * Relations
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
