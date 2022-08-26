<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $table = 'services';
    public $timestamps = false;
    public $fillable = [
        'name'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static $rules = [
        'name' => 'string'
    ];

    public function laundry_type()
    {
        return $this->belongsToMany(LaundryType::class);
    }
    public function laundry()
    {
        return $this->belongsToMany(Laundry::class);
    }
}
