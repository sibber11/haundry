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
        'category_id',
        'name',
        'wash_price',
        'dry_wash_price',
        'iron_price'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static $rules = [
        'category_id' => 'required|numeric|exists:categories,id',
        'name' => 'required|string',
        'wash_price' => 'nullable',
        'dry_wash_price' => 'nullable',
        'iron_price' => 'nullable'
    ];

    public $with = [
        'category'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
