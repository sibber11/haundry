<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';
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

    protected function name(): Attribute
    {
        return Attribute::make(get:fn($value) => ucfirst($value));
    }

    public function laundry_types()
    {
        return $this->hasMany(LaundryType::class);
    }
}
