<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public static $rules = [
        'image' => 'required|image',
        'show' => 'required|boolean',
        'caption' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
    public $table = 'banners';
    public $fillable = [
        'image',
        'show',
        'caption'
    ];
    protected $casts = [
        'image' => 'string',
        'caption' => 'string',
        'show' => 'boolean'
    ];


}
