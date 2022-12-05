<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'packages';

    public $fillable = [
        'name',
        'points',
        'price',
        'active'
    ];

    protected $casts = [
        'name' => 'string',
        'active' => 'boolean'
    ];

    public static $rules = [
        'name' => 'required|string',
        'points' => 'required',
        'price' => 'required',
    ];
}
