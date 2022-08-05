<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class LaundryType extends Model
{
    public $table = 'laundry_types';

    public $fillable = [
        'category',
        'name',
        'wash_price',
        'dry_wash_price',
        'iron_price'
    ];

    protected $casts = [
        'category' => 'string',
        'name' => 'string'
    ];

    public static $rules = [
        'category' => 'required|string',
        'name' => 'required|string',
        'wash_price' => 'nullable',
        'dry_wash_price' => 'nullable',
        'iron_price' => 'nullable'
    ];

    
}
