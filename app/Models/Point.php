<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public $table = 'points';

    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function logs()
    {
        return $this->belongsToMany(Log::class)->withPivot('amount');
    }

    public function sync_total()
    {
        //todo update total based on the log.
    }
}
