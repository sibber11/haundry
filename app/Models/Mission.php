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
        'user_id' => 'required',
//        'status' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    protected $attributes = [
        'status' => 'pending'
    ];

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
    public function change_status_running()
    {
        $this->update([
            'status' => 'running'
        ]);
    }
    public function change_status_completed()
    {
        $this->update([
            'status' => 'completed'
        ]);
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
