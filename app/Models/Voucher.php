<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Voucher extends Model
{

    protected $fillable = [
        'discount'
    ];

    protected $casts = [
        'code' => 'string'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Voucher $voucher) {
            $voucher->code = self::generateCode();
        });
    }

    protected static function generateCode(): string
    {
        do {
            $code = Str::random(6);
        } while (static::codeExists($code));
        return $code;
    }

    public function scopeCodeExists(Builder $query, string $code)
    {
        return $query->whereCode($code)->exists();
    }
}
