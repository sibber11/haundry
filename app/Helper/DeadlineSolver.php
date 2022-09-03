<?php

namespace App\Helper;

use Illuminate\Support\Carbon;

class DeadlineSolver
{
    public static function solve($input)
    {
        throw_if(!$input['deadline_date'] && !$input['deadline_time'], \InvalidArgumentException::class);
        return Carbon::make($input['deadline_date'].$input['deadline_time']);

    }
}
