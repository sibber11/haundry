<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Voucher extends Model
{

    public $table = 'vouchers';

    public $fillable = [
        'code',
        'discount',
        'minimum',
        'customer_id',
        'is_used'
    ];

    protected $casts = [
        'code' => 'string',
        'is_used' => 'boolean'
    ];

    public static $rules = [
        'discount' => 'required',
        'minimum' => 'required',
        'customer_id' => 'nullable',
        'is_used' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    protected $attributes = [
        'is_used' => false,
        'discount' => 0,
        'minimum' => 0
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

    public function is_useable_by(Customer $customer): bool
    {
        return $this->customer_id == $customer->id && !$this->is_used;
    }

    public function mark_as_used()
    {
        $this->is_used = true;
        $this->save();
    }
}

