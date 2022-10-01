<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'orders';

    protected static function booted()
    {
        static::addGlobalScope('income', function (Builder $builder) {
            $builder->selectRaw('distinct year(updated_at) as year')->orderBy('year', 'desc');
        });
    }

    public function by_year()
    {
        return $this->hasMany(Order::class, 'updated_at')->select('total')->whereRaw('year(updated_at) = ' . $this->year);
    }
}
