<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaundryType extends Model
{
    use HasFactory;
    public $table = 'laundry_types';
    public $timestamps = false;

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
