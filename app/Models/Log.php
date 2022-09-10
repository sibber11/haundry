<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    public $table = 'logs';

    public $fillable = [
        'content'
    ];

    public function points()
    {
        return $this->belongsToMany(Point::class);
    }
}
