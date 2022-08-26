<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static $rules = [
        'category_id' => 'required|numeric|exists:categories,id',
        'name' => 'required|string',
        'services' => 'required|array'
    ];

    public $with = [
        'category','services'
    ];
    protected function name(): Attribute
    {
        return Attribute::make(get:fn($value) => ucfirst($value));
    }

    /**
     * @param $services_array
     * [service_id=>['price'=>service_price]]
     */
    public function add_services($services_array)
    {
        $this->services()->attach($services_array);
    }
    public function update_services($services_array)
    {
        $this->services()->sync($services_array);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('price');
    }
}
