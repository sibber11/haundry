<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestCall extends Model
{
    protected $fillable = [
        'name', 'phone'
    ];

    protected $attributes = [
        'called' => false
    ];
    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('called',false);
    }

    public function mark_as_called()
    {
        $this->called = true;
        $this->save();
    }
}
